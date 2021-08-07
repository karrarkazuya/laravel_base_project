<?php

namespace App\Http\Livewire\Users;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsersEdit extends Component
{
    public $user;
    public $teams;
    public $roles;

    // used for the add form
    public $name = '';
    public $email = '';
    public $password = '';
    public $team = '';
    public $role = '';
    public $phone = '';
    public $address = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|min:3',
        'password' => 'required|min:3',
        'team' => 'required|min:1|numeric',
        'role' => 'required|min:1|numeric',
    ];

    public function mount($user)
    {
        $this->user = User::where('id', '=', $user->id)->whereNull('deleted_at')->first();
        $this->teams = Team::get();
        $this->roles = Role::get();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->team = $this->user->current_team_id;
        $role = $user->roles()->first();
        $this->role = $role != null ? $role->id : 0;
    }

    public function render()
    {
        return view('livewire.users.users-edit');
    }

    public function updateUser()
    {
        if(Auth::user()->can('manage-users')){
            $this->validate();
                $this->user->update([
                    'name' => $this->name, 
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'current_team_id' => $this->team
                ]);
                $role = Role::where('id', '=', $this->role)->first();
                $this->user->syncRoles([$role->name]);
                $this->mount($this->user);
                $this->emit('saved');
            }

            return view('livewire.users.show-users');
    }
}
