<?php

namespace App\Http\Livewire\Roles;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        if(Auth::user()->can('manage-roles'))
            return view('livewire.roles.show');
    }
}
