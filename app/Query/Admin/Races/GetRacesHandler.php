<?php

declare(strict_types=1);


namespace App\Query\Admin\Races;

use App\Models\Race;

class GetRacesHandler
{
    public function handle(GetRacesQuery $query)
    {
        if ($query->showDeleted) {
            $qb = Race::onlyTrashed()->with(['user']);
        } else {
            $qb = Race::query()->with(['user']);
        }

        $search = trim($query->search);
        if ($search !== '') {
            $qb->whereRaw('LOWER(title) LIKE ?', ['%'.strtolower($search).'%']);
        }

        $orderBy = $query->orderBy;
        $dir = $orderBy['desc'] ? 'desc' : 'asc';
        $qb->orderBy($orderBy['field'], $dir);

        return $qb->paginate($query->pagination);
    }
}
