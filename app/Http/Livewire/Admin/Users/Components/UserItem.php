<?php

namespace App\Http\Livewire\Admin\Users\Components;

use App\Http\Livewire\WithMessage;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class UserItem extends Component
{
    use AuthorizesRequests;
    use WithMessage;

    public User $user;

    public bool $showDeleted = false;

    protected $listeners = [
        'userItemToggleDeleted',
    ];

    public function render()
    {
        return view('livewire.admin.users.components.user-item');
    }

    public function delete()
    {
        $this->authorize('delete', $this->user);

        $this->user->delete();

        $this->emit('refreshUsers');
        $this->withMessage('success', trans('User was successfully deleted!'));
    }

    public function userItemToggleDeleted(bool $value): void
    {
        $this->showDeleted = $value;
    }
}
