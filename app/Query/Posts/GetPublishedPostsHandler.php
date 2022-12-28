<?php

declare(strict_types=1);


namespace App\Query\Posts;

use App\Models\Post;

class GetPublishedPostsHandler
{
    public function handle(GetPublishedPostsQuery $query)
    {
        return Post::query()->published()->newest()->paginate($query->pagination);
    }
}
