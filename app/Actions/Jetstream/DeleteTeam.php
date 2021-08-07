<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Contracts\DeletesTeams;

class DeleteTeam implements DeletesTeams
{
    /**
     * Delete the given team.
     *
     * @param  mixed  $team
     * @return void
     */
    public function delete($team)
    {
        if((Auth::user())->can('manage-teams')){
        $team->purge();
        }
    }
}
