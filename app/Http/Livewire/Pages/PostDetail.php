<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

    public function mount(Post $post): void
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.pages.post-detail')
            ->layout('layouts.guest');
    }
}
