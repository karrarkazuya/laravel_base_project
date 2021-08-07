<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        return view('livewire.roles.show', ['roles' => Role::where('team_id', '=', (Auth::user())->current_team_id)->get()]);
    }

    public function view($role, Request $request)
    {
        $role = Role::where('id', '=', $role)->where('team_id', '=', (Auth::user())->current_team_id)->first();
        return view('livewire.roles.edit', ['role' => $role]);
    }
}
