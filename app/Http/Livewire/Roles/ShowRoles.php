<?php

namespace App\Http\Livewire\Roles;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\Array_;
use Spatie\Permission\Models\Role;

class ShowRoles extends Component
{
    public $roles = [];
    public $name = '';

    protected $rules = [
        'name' => 'required|min:3'
    ];

    public function mount()
    {
        $this->roles = Role::where('team_id', '=', (Auth::user())->current_team_id)->get();
    }

    public function render()
    {
        if(Auth::user()->can('manage-roles'))
            return view('livewire.roles.show-roles');
    }


    public function removeRole($role_id)
    {
        if(Auth::user()->can('manage-roles')){
            $role = Role::where('id', '=', $role_id)->where('team_id', '=', (Auth::user())->current_team_id)->first();
            try {
                if(User::role($role->name)->count() > 0){
                    $this->emit('cant');
                }else{
                    $role->delete();
                    $this->mount();
                    $this->emit('saved');
                }
            } catch (\Throwable $th) {
                $role->delete();
                $this->mount();
                $this->emit('saved');
            }
        }
    }



    public function addNewRole()
    {
        if(Auth::user()->can('manage-roles')){
            $this->validate();
            $role = Role::where('name', '=', $this->name)->where('team_id', '=', (Auth::user())->current_team_id)->exists();
            if(!$role){
                Role::create(['name' => $this->name, 'guard_name' => 'web', 'team_id' => (Auth::user())->current_team_id]);
                $this->mount();
                $this->emit('saved');
            }else{
                $this->emit('exists');
            }
            return view('livewire.roles.edit-role');
        }
    }
}
