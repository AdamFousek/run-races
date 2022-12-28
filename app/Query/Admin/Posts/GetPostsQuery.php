<?php

declare(strict_types=1);


namespace App\Query\Admin\Posts;

class GetPostsQuery
{
    public function __construct(
        public readonly string $search = '',
        public readonly int $pagination = 5,
        public readonly bool $showDeleted = false,
        public readonly array $orderBy = [],
    ) {
    }
}
