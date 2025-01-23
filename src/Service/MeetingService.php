<?php

namespace App\Service;

use App\Entity\Meeting;

class MeetingService
{
    public function recordAttendance(Meeting $meeting, array $attendees): void
    {
        $meeting->setAttendance($attendees);
    }

    public function generateMinutes(Meeting $meeting, string $notes): void
    {
        $meeting->setNotes($notes);
    }
}