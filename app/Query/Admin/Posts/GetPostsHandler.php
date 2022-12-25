<?php

declare(strict_types=1);


namespace App\Query\Admin\Posts;

use App\Models\Post;

class GetPostsHandler
{
    public function handle(GetPostsQuery $query)
    {
        if ($query->showDeleted) {
            $qb = Post::onlyTrashed()->with('user');
        } else {
            $qb = Post::query()->with('user');
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
