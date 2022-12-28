<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use App\Query\Admin\Posts\GetPostsHandler;
use App\Query\Admin\Posts\GetPostsQuery;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
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
        $this->authorize('viewAny', Post::class);
    }


    public function render(GetPostsHandler $handler)
    {
        $data = [
            'posts' => $handler->handle(new GetPostsQuery(
                $this->search,
                $this->pagination,
                $this->showDeleted,
                $this->orderBy,
            )),
        ];

        return view('livewire.admin.posts.show-posts', $data);
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
