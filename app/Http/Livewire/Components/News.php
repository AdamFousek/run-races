<?php

namespace App\Http\Livewire\Components;

use App\Query\Posts\GetPublishedPostsHandler;
use App\Query\Posts\GetPublishedPostsQuery;
use Livewire\Component;

class News extends Component
{
    public function render(GetPublishedPostsHandler $handler)
    {
        $data = [
            'news' => $handler->handle(new GetPublishedPostsQuery()),
        ];

        return view('livewire.components.news', $data);
    }
}
