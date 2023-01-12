<?php

namespace App\Policies;

use App\Models\Race;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RacePolicy
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

        return Response::deny();
    }

    public function create(User $user): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny();
    }

    public function update(User $user, Race $race): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny();
    }

    public function delete(User $user, Race $race): Response
    {
        if ($user->isModerator()) {
            return Response::allow();
        }

        return Response::deny();
    }

    public function restore(User $user, Race $race)
    {
        return Response::deny();
    }
}
