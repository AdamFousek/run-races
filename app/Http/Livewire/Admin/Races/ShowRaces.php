<?php

namespace App\Http\Livewire\Admin\Races;


use App\Models\Race;
use App\Query\Admin\Races\GetRacesHandler;
use App\Query\Admin\Races\GetRacesQuery;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRaces extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public string $search = '';

    public int $pagination = 25;

    public array $orderBy = [
        'field' => 'created_at',
        'desc' => true
    ];

    public bool $showDeleted = false;

    protected $listeners = [
        'refreshRaces' => '$refresh',
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingShowDeleted(): void
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'components.admin.pagination';
    }


    public function mount()
    {
        $this->authorize('viewAny', Race::class);
    }

    public function render(GetRacesHandler $handler)
    {
        $data = [
            'races' => $handler->handle(new GetRacesQuery(
                $this->search,
                $this->pagination,
                $this->showDeleted,
                $this->orderBy,
            )),
        ];

        return view('livewire.admin.races.show-races', $data);
    }

    public function changeOrderBy(string $field): void
    {
        if ($this->orderBy['field'] === $field) {
            $this->orderBy['desc'] = !$this->orderBy['desc'];
        } else {
            $this->orderBy['field'] = $field;
            $this->orderBy['desc'] = false;
        }
    }
}
