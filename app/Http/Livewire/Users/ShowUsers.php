<?php

namespace App\Http\Livewire\Users;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Str;

class ShowUsers extends Component
{
    public $users;
    public $teams;

    // used for the add form
    public $name = '';
    public $email = '';
    public $password = '';
    public $team = '';
    public $phone = '';
    public $address = '';
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|min:3',
        'password' => 'required|min:3',
        'team' => 'required|min:1|numeric',
    ];

    public function mount()
    {
        $this->users = User::whereNull('deleted_at')->get();
        $this->teams = Team::get();
    }

    public function render()
    {
        return view('livewire.users.show-users');
    }


    public function addNewUser()
    {
        if(Auth::user()->can('manage-users')){
            $this->validate();
            $user = User::where('name', '=', $this->name)->orWhere('email', '=', $this->email)->exists();
            if(!$user){
                User::create(['name' => $this->name, 
                'email' => $this->email,
                'email_verified_at' => now(),
                'password' => bcrypt($this->password), // password
                'remember_token' => Str::random(10),
                'current_team_id' => $this->team
                ]);
                $this->mount();
                $this->emit('saved');
            }else{
                $this->emit('exists');
            }

            return view('livewire.users.show-users');
        }
    }



    public function disableUser($user_id)
    {
        if(Auth::user()->can('manage-users')){
            $user = User::where('id', '=', $user_id)->exists();
            if($user){
                User::where('id', '=', $user_id)->update(['enabled' => 0]);
                $this->mount();
                $this->emit('saved');
            }else{
                $this->emit('exists');
            }
        }
        return view('livewire.users.show-users');
    }


    public function enableUser($user_id)
    {
        if(Auth::user()->can('manage-users')){
            $user = User::where('id', '=', $user_id)->exists();
            if($user){
                User::where('id', '=', $user_id)->update(['enabled' => 1]);
                $this->mount();
                $this->emit('saved');
            }else{
                $this->emit('exists');
            }
        }
        return view('livewire.users.show-users');
    }
}
