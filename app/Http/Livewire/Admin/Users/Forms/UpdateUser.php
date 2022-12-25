<?php

namespace App\Http\Livewire\Admin\Users\Forms;

use App\Models\User;
use Livewire\Component;

class UpdateUser extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.admin.users.forms.update-user');
    }
}
