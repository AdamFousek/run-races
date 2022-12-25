<?php

namespace App\Http\Livewire\Admin\Users\Forms;

use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.admin.users.forms.delete-user');
    }

    public function delete()
    {
        $this->user->delete();

        return redirect(route('admin.users.index'));
    }
}
