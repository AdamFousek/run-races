<?php

declare(strict_types=1);


namespace App\Query\Admin\Posts;

class GetPostsQuery
{
    public function __construct(
        public readonly string $search,
        public readonly int $pagination,
        public readonly bool $showDeleted,
        public readonly array $orderBy,
    ) {
    }
}
