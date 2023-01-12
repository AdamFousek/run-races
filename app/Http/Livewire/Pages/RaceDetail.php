<?php

namespace App\Http\Livewire\Pages;

use App\Models\Race;
use Livewire\Component;

class RaceDetail extends Component
{
    public Race $race;

    public function mount(Race $race): void
    {
        $this->race = $race;
    }

    public function render()
    {
        return view('livewire.pages.race-detail')
            ->layout('layouts.guest');
    }
}
