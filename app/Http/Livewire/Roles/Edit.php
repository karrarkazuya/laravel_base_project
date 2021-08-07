<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;

class Edit extends Component
{
    public $role;

    public function mount($role)
    {
        $this->role = $role;
    }

    public function render()
    {
        return view('livewire.roles.edit');
    }
}
