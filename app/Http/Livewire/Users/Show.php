<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class Show extends Component
{
    public $users;

    public function mount($users)
    {
        $this->users = $users;
    }

    public function render()
    {
        return view('livewire.users.show');
    }
}
