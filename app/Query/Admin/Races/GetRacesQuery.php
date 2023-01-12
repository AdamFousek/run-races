<?php

declare(strict_types=1);


namespace App\Query\Admin\Races;

class GetRacesQuery
{
    public function __construct(
        public readonly string $search = '',
        public readonly int $pagination = 25,
        public readonly bool $showDeleted = false,
        public readonly array $orderBy = [],
    ) {
    }
}
