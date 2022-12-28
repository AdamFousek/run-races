<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TagPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function viewAny(User $user): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this page'));
    }

    public function view(User $user, Tag $tag)
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this page'));
    }

    public function create(User $user): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function update(User $user, Tag $tag): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function delete(User $user, Tag $tag): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function restore(User $user, Tag $tag): Response
    {
        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function forceDelete(User $user, Tag $tag): Response
    {
        return Response::deny(trans('You do not have permission for this operation'));
    }
}
