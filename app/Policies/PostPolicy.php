<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return Response::allow();
        }
    }

    public function viewAny(User $user): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this page'));
    }

    public function view(User $user, Post $post)
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

    public function update(User $user, Post $post): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function delete(User $user, Post $post): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function restore(User $user, Post $post): Response
    {
        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function forceDelete(User $user, Post $post): Response
    {
        return Response::deny(trans('You do not have permission for this operation'));
    }
}
