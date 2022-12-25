<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CreatePost extends Component
{
    use AuthorizesRequests;

    public function mount()
    {
        $this->authorize('create', Post::class);
    }

    public function render()
    {
        return view('livewire.admin.posts.create-post');
    }
}
