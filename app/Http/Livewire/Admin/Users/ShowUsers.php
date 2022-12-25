<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use App\Query\Admin\Users\GetUsersHandler;
use App\Query\Admin\Users\GetUsersQuery;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public string $search = '';

    public int $pagination = 25;

    public array $orderBy = [
        'field' => 'name',
        'desc' => false
    ];

    public bool $showDeleted = false;

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
        return 'components.pagination';
    }

    public function mount()
    {
        $this->authorize('viewAny', User::class);
    }

    public function render(GetUsersHandler $getUsersHandler)
    {
        $data = [
            'users' => $getUsersHandler->handle(new GetUsersQuery(
                $this->search,
                $this->pagination,
                $this->showDeleted,
                $this->orderBy,
            )),
        ];

        return view('livewire.admin.users.show-users', $data);
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
