<?php

namespace App\Http\Livewire\Components;

use App\Models\Post;
use Livewire\Component;

class Comments extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $data = [
            'comments' => $this->post->comments()->published()->get(),
        ];

        return view('livewire.components.comments', $data);
    }
}
