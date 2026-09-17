<div>
    <style>
        .lw-calendar-card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            overflow: hidden;
        }
        .lw-calendar-header {
            background: #9cc568;
            color: #fff;
            padding: 18px 22px;
        }
        .lw-calendar-header .btn-nav {
            background: rgba(255,255,255,0.15);
            border: none;
            color: #fff;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background .2s;
        }
        .lw-calendar-header .btn-nav:hover {
            background: rgba(255,255,255,0.3);
        }
        .lw-calendar-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }
        .lw-calendar-table thead th {
            background: #f4f6fb;
            color: #4e5d78;
            font-weight: 600;
            font-size: 13px;
            padding: 10px 0;
            text-align: center;
            border-bottom: 1px solid #eceff5;
        }
        .lw-day-cell {
            vertical-align: top;
            border: 1px solid #eef0f6;
            height: 115px;
            padding: 6px;
            transition: background .15s;
            position: relative;
        }
        .lw-day-cell:hover {
            background: #f8f9ff;
        }
        .lw-day-cell.lw-outside {
            background: #fafafa;
            color: #c3c8d4;
        }
        .lw-day-cell.lw-today {
            background: #fff8e6;
        }
        .lw-day-cell.lw-dragover {
            background: #e7edff !important;
            outline: 2px dashed #4e73df;
            outline-offset: -4px;
        }
        .lw-day-number {
            font-size: 13px;
            font-weight: 600;
            width: 24px;
            height: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .lw-day-cell.lw-today .lw-day-number {
            background: #ffc107;
            color: #fff;
        }
        .lw-event-pill {
            background: linear-gradient(135deg, #36b37e, #2e9e6e);
            color: #fff;
            font-size: 11px;
            border-radius: 6px;
            padding: 3px 6px;
            margin-top: 4px;
            cursor: grab;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            box-shadow: 0 1px 3px rgba(0,0,0,0.15);
            transition: transform .1s;
        }
        .lw-event-pill:hover {
            transform: scale(1.03);
        }
        .lw-event-pill:active {
            cursor: grabbing;
            opacity: .6;
        }
        .lw-add-btn {
            border: none;
            background: transparent;
            color: #4e73df;
            font-size: 18px;
            opacity: 0;
            transition: opacity .15s;
        }
        .lw-day-cell:hover .lw-add-btn {
            opacity: 1;
        }
    </style>

    <div class="card lw-calendar-card">
        <div class="lw-calendar-header d-flex justify-content-between align-items-center">
            <button type="button" wire:click="goToPreviousMonth" class="btn-nav">
                <i class="fa fa-chevron-right"></i>
            </button>
            <div class="text-center">
                <h5 class="mb-0 font-weight-bold">{{ $startsAt->translatedFormat('F Y') }}</h5>
                <small style="opacity:.85;">{{ trans('calendar.Drag_Booking') }}</small>
            </div>
            <button type="button" wire:click="goToNextMonth" class="btn-nav">
                <i class="fa fa-chevron-left"></i>
            </button>
        </div>

        <div class="table-responsive">
            <table class="lw-calendar-table">
                <thead>
                    <tr>
                        @foreach($monthGrid->first() as $day)
                            <th>{{ $day->translatedFormat('l') }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($monthGrid as $week)
                        <tr>
                            @foreach($week as $day)
                                @php
                                    $dayEvents = $getEventsForDay($day, $events);
                                    $inMonth = $day->isSameMonth($startsAt);
                                    $isToday = $day->isToday();
                                    $cellClasses = 'lw-day-cell'
                                        . (!$inMonth ? ' lw-outside' : '')
                                        . ($isToday ? ' lw-today' : '');
                                @endphp
                                <td
                                    class="{{ $cellClasses }}"
                                    ondragover="event.preventDefault(); this.classList.add('lw-dragover');"
                                    ondragleave="this.classList.remove('lw-dragover');"
                                    ondrop="
                                        event.preventDefault();
                                        this.classList.remove('lw-dragover');
                                        var eventId = event.dataTransfer.getData('text/plain');
                                        Livewire.find('{{ $componentId }}').call('onEventDropped', eventId, {{ $day->year }}, {{ $day->month }}, {{ $day->day }});
                                    "
                                >
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="lw-day-number">{{ $day->format('j') }}</span>
                                    </div>

                                    <div style="max-height: 70px; overflow-y: auto;">
                                        @foreach($dayEvents as $event)
                                            <div
                                                class="lw-event-pill"
                                                ondragstart="event.dataTransfer.setData('text/plain', '{{ $event['id'] }}');"
                                                wire:click.stop="onEventClick('{{ $event['id'] }}')"
                                                title="{{ $event['title'] }}"
                                            >
                                                <i class="mr-1 fa fa-clock" style="font-size:10px;"></i>
                                                {{ $event['time'] ?? '' }} - {{ $event['title'] }}
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
