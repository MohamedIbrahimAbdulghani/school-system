<?php

namespace App\Livewire;

use App\Models\Calendar as CalendarModel;
use Omnia\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;

class Calendar extends LivewireCalendar
{
    public bool $showModal = false;
    public ?string $selectedDate = null;
    public ?int $editingId = null;

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

    public function onDayClick($year, $month, $day)
    {
        $this->editingId = null;
        $this->selectedDate = sprintf('%04d-%02d-%02d', $year, $month, $day);
        $this->reset(['title', 'notes']);
        $this->time = '10:00';
        $this->showModal = true;
    }

    public function onEventClick($eventId)
    {
        $calendar = CalendarModel::find($eventId);

        if ($calendar) {
            $this->editingId = $calendar->id;
            $this->selectedDate = $calendar->scheduled_at->format('Y-m-d');
            $this->time = $calendar->scheduled_at->format('H:i');
            $this->title = $calendar->title;
            $this->notes = $calendar->notes;
            $this->showModal = true;
        }
    }

    // بيتنادى تلقائي لما تسحب حجز وتفلته في يوم تاني
    public function onEventDropped($eventId, $year, $month, $day)
    {
        $calendar = CalendarModel::find($eventId);

        if ($calendar) {
            $time = $calendar->scheduled_at->format('H:i:s');
            $newDate = sprintf('%04d-%02d-%02d', $year, $month, $day);

            $calendar->update([
                'scheduled_at' => $newDate . ' ' . $time,
            ]);
        }
    }

    public function saveCalendar()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'time' => 'required',
        ]);

        if ($this->editingId) {
            CalendarModel::find($this->editingId)?->update([
                'title' => $this->title,
                'notes' => $this->notes,
                'scheduled_at' => $this->selectedDate . ' ' . $this->time,
            ]);
        } else {
            CalendarModel::create([
                'title' => $this->title,
                'notes' => $this->notes,
                'scheduled_at' => $this->selectedDate . ' ' . $this->time,
            ]);
        }

        $this->showModal = false;
        $this->reset(['title', 'notes', 'editingId']);
    }

    public function deleteCalendar()
    {
        if ($this->editingId) {
            CalendarModel::find($this->editingId)?->delete();
        }

        $this->showModal = false;
        $this->reset(['title', 'notes', 'editingId']);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['title', 'notes', 'editingId']);
    }

    public function render()
    {
        $events = $this->events();

        return view('livewire.calendar')
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
