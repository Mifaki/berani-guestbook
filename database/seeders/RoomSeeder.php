<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Room;
use App\Models\TimeSlot;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rooms = [
            ['name' => 'Room A', 'description' => 'Description of Room A', 'capacity' => 10],
            ['name' => 'Room B', 'description' => 'Description of Room B', 'capacity' => 15],
            ['name' => 'Room C', 'description' => 'Description of Room C', 'capacity' => 20],
        ];

        foreach ($rooms as $roomData) {
            $room = Room::create($roomData);

            $timeSlots = TimeSlot::all();
            $room->timeSlots()->attach($timeSlots->pluck('id')->toArray());

            if ($room->name === 'Room B') {
                $room->timeSlots()->detach($timeSlots->last()->id);
            }
        }
    }
}
