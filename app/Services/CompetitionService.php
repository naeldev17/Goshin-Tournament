<?php
 
namespace App\Services;

use App\Http\Controllers\Api\V1\CompetitionController;
use App\Models\Competition;
use App\Models\User;

 class CompetitionService
 {
    public function create(array $data, User $user): Competition
    {
      return Competition::create([
        ...$data,
        'owner_id' => $user->id
        ]);
      
    }

    public function update(array $data, User $user, Competition $competition)
    {
      if($competition->owner_id !== $user->id)
        {
          abort(403, "Usuário não autorizado");
        }

      $competition->update($data);

      return $competition;
    }
 }