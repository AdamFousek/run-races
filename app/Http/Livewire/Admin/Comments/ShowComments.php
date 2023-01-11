<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Post;
use Livewire\Component;

class ShowComments extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $data = [
            'comments' => $this->post->comments,
        ];

        return view('livewire.admin.comments.show-comments', $data);
    }
}
