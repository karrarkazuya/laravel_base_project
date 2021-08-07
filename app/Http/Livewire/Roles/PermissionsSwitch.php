<?php

namespace App\Http\Livewire\Roles;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionsSwitch extends Component
{

    public $role;
    public $permissionsAdded;
    public $permissionsLeft;


    public function mount($role)
    {
        $this->role = $role;

        $this->permissionsAdded = $role->permissions;

        $leftPermissions = array();
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
            return view('livewire.roles.permissions-switch');
    }


    public function addPermission($permission)
    {
        $permission = Permission::where('team_id', '=', (Auth::user())->current_team_id)->find($permission);
        if(Auth::user()->can('manage-roles'))
            $this->role->givePermissionTo($permission->name);
        $this->mount($this->role);
        $this->emit('saved');
    }


    public function removePermission($permission)
    {
        $permission = Permission::where('team_id', '=', (Auth::user())->current_team_id)->find($permission);
        if(Auth::user()->can('manage-roles'))
            $this->role->revokePermissionTo($permission->name);
        $this->mount($this->role);
        $this->emit('saved');
    }

}
