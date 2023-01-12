<?php

namespace App\Policies;

use App\Models\User;
use Faker\Provider\es_AR\PhoneNumber;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
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
        return Response::deny(trans('You do not have permission for this page'));
    }

    public function view(User $user, User $model): Response
    {
        return Response::allow();
    }

    public function create(User $user): Response|bool
    {
        return Response::allow();
    }

    public function update(User $user, User $model): Response
    {
        if ($user->id === $model->id || $user->isAdmin()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function delete(User $user, User $model)
    {
        if ($user->id === $model->id || $user->isAdmin()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function restore(User $user, User $model): Response
    {
        if ($user->isAdmin()) {
            return Response::allow();
        }

        return Response::deny(trans('You do not have permission for this operation'));
    }

    public function forceDelete(User $user, User $model): Response
    {
        return Response::deny(trans('You do not have permission for this operation'));
    }
}
