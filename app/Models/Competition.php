<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
   protected $fillable = [
      'name',
      'date',
      'location',
      'owner_id'
   ];
   
   public function owner()
   {
    return $this->belongsTo(User::class, 'owner_id');
   }


}
