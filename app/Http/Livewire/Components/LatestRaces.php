<?php

namespace App\Http\Livewire\Components;

use App\Query\Admin\Races\GetRacesHandler;
use App\Query\Admin\Races\GetRacesQuery;
use Livewire\Component;

class LatestRaces extends Component
{
    public function render(GetRacesHandler $handler)
    {
        $data = [
            'races' => $handler->handle(new GetRacesQuery(
                pagination: 5,
                orderBy: [
                    'field' => 'created_at',
                    'desc' => true
                ],
            ))
        ];

        return view('livewire.components.latest-races', $data);
    }
}
