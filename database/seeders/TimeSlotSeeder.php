<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\TimeSlot;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $timeSlots = [
            ['start' => '2024-03-23 09:00:00', 'end' => '2024-03-23 12:00:00'],
            ['start' => '2024-03-23 13:00:00', 'end' => '2024-03-23 16:00:00'],
            ['start' => '2024-03-23 16:00:00', 'end' => '2024-03-23 17:00:00']
        ];

        foreach ($timeSlots as $slot) {
            TimeSlot::create([
                'start_time' => $slot['start'],
                'end_time' => $slot['end'],
            ]);
        }
    }
}
