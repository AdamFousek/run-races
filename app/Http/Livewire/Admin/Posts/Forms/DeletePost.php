<?php

namespace App\Http\Livewire\Admin\Posts\Forms;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class DeletePost extends Component
{
    use AuthorizesRequests;

    public Post $post;

    public function mount(Post $post)
    {
        $this->authorize('delete', $post);

        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.admin.posts.forms.delete-post');
    }

    public function delete()
    {
        $this->authorize('delete', $this->post);

        $this->post->delete();

        $this->redirect(route('dashboard'));
    }
}
