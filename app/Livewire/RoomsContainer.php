<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Component;

class RoomsContainer extends Component
{
    public $search  = "";
    public function render()
    {
        $results = [];

        if(strlen($this->search) >= 1) {
            $results = Room::where('name', 'like', '%'.$this->search.'%')->get();
        } else {
            $results = Room::all();
        }

        return view('livewire.rooms-container', [
            'rooms' => $results
        ]);
    }
}
