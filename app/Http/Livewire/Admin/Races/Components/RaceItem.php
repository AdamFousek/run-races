<?php

namespace App\Http\Livewire\Admin\Races\Components;

use App\Http\Livewire\WithMessage;
use App\Models\Race;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class RaceItem extends Component
{
    use AuthorizesRequests;
    use WithMessage;

    public Race $race;

    public bool $showDeleted = false;

    public function mount(Race $race): void
    {
        $this->race = $race;
    }

    public function render()
    {
        return view('livewire.admin.races.components.race-item');
    }

    public function restore(): void
    {
        $this->authorize('restore', $this->race);

        $this->race->restore();

        $this->withMessage('success', trans('Race was successfully restore!'));
        $this->emit('refreshRaces');
    }

    public function delete(): void
    {
        $this->authorize('delete', $this->race);

        $this->race->delete();

        $this->withMessage('success', trans('Race was deleted!'));
        $this->emit('refreshRaces');
    }
}
