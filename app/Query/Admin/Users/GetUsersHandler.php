<?php

declare(strict_types=1);


namespace App\Query\Admin\Users;

use App\Models\User;

class GetUsersHandler
{
    public function handle(GetUsersQuery $query)
    {
        if ($query->showDeleted) {
            $qb = User::onlyTrashed()->with('role');
        } else {
            $qb = User::query()->with('role');
        }

        $search = trim($query->search);
        if ($search !== '') {
            $qb->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($search).'%'])
                ->orWhereRaw('LOWER(email) LIKE ?', ['%'.strtolower($search).'%']);
        }

        $orderBy = $query->orderBy;
        $dir = $orderBy['desc'] ? 'desc' : 'asc';
        $qb->orderBy($orderBy['field'], $dir);

        return $qb->paginate($query->pagination);
    }
}
