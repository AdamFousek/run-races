<?php

namespace App\Http\Livewire\Admin\Posts\Components;

use App\Http\Livewire\WithMessage;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class PostItem extends Component
{
    use AuthorizesRequests;
    use WithMessage;

    public Post $post;

    public bool $showDeleted = false;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.admin.posts.components.post-item');
    }

    public function restore()
    {
        $this->authorize('restore', $this->post);

        $this->post->restore();

        $this->withMessage('success', trans('Post was successfully restore!'));
        $this->emit('refreshPosts');
    }

    public function delete()
    {
        $this->authorize('delete', $this->post);

        $this->post->delete();

        $this->withMessage('success', trans('Post was deleted!'));
        $this->emit('refreshPosts');
    }
}
