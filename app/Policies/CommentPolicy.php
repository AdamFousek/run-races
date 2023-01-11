<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create(User $user): Response
    {
        if (Auth::user() !== null) {
            return Response::allow();
        }

        return Response::deny();
    }

    public function update(User $user, Comment $comment)
    {
        if ($user->id === $comment->user->id) {
            return Response::allow();
        }

        return Response::deny();
    }

    public function delete(User $user, Comment $comment): Response
    {
        if ($user->isAdmin()) {
            return Response::allow();
        }

        if ($user->id === $comment->user->id) {
            return Response::allow();
        }

        return Response::deny();
    }

    public function restore(User $user, Comment $comment): Response
    {
        if ($user->isAdmin()) {
            return Response::allow();
        }

        return Response::deny();
    }

    public function report(User $user, Comment $comment): Response
    {
        if ($user->id !== $comment->user->id) {
            return Response::allow();
        }

        return Response::deny();
    }

    public function toggleStatus(User $user, Comment $comment): Response
    {
        if ($user->isAdmin()) {
            return Response::allow();
        }

        return Response::deny();
    }

    public function forceDelete(User $user, Comment $comment): Response
    {
        if ($user->isAdmin()) {
            return Response::allow();
        }

        return Response::deny();
    }
}
