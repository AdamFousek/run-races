<?php

declare(strict_types=1);


namespace App\Query\Posts;

class GetPublishedPostsQuery
{
    public function __construct(
        public readonly int $pagination = 5,
    ) {
    }
}
