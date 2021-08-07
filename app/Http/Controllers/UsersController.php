<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        return view('livewire.users.show', ['users' => User::whereNull('deleted_at')->get()]);
    }


    public function view($user, Request $request)
    {
        $user = User::where('id', '=', $user)->whereNull('deleted_at')->first();
        return view('livewire.users.edit', ['user' => $user]);
    }

}
