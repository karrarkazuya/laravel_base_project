<?php

namespace App\Http\Livewire\Roles;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class EditRole extends Component
{
    public $role;
    public $name;
    public $permissionsAdded;
    public $permissionsLeft;

    protected $rules = [
        'name' => 'required|min:3'
    ];

    public function mount($role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->permissionsAdded = $role->permissions;
        $leftPermissions = array(); // 
        $a = Permission::where('team_id', '=', (Auth::user())->current_team_id)->get(); // all permissions
        foreach ($a as $p1) {
            $add = true;
            foreach ($this->permissionsAdded as $p2) {
                if($p1->id == $p2->id){
                    $add = false;
                    break;
                }
            }
            if($add)
                array_push($leftPermissions, $p1);
        }
        $this->permissionsLeft = $leftPermissions;
    }

    public function render()
    {
        if(Auth::user()->can('manage-roles'))
            return view('livewire.roles.edit-role');
    }

    public function updateRoleName()
    {
        if(Auth::user()->can('manage-roles')){
            $this->validate();
            $this->role->name = $this->name;
            $this->role->save();
            $this->emit('saved');
            return view('livewire.roles.edit-role');
        }
    }
}
