<?php

namespace App\Livewire;

use App\Models\Calendar as CalendarModel;
use Omnia\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;

class StudentCalendar extends LivewireCalendar
{

    public string $title = '';
    public string $notes = '';
    public string $time = '10:00';

    public function events(): Collection
    {
        return CalendarModel::query()
            ->whereDate('scheduled_at', '>=', $this->gridStartsAt)
            ->whereDate('scheduled_at', '<=', $this->gridEndsAt)
            ->get()
            ->map(function (CalendarModel $calendar) {
                return [
                    'id' => $calendar->id,
                    'title' => $calendar->title,
                    'description' => $calendar->notes,
                    'date' => $calendar->scheduled_at,
                    'time' => $calendar->scheduled_at->format('H:i'),
                ];
            });
    }


    public function render()
    {
        $events = $this->events();

        return view('livewire.StudentCalendar')
            ->with([
                'componentId' => $this->getId(),
                'monthGrid' => $this->monthGrid(),
                'events' => $events,
                'getEventsForDay' => function ($day) use ($events) {
                    return $this->getEventsForDay($day, $events);
                },
            ]);
    }
}