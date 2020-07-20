<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo('App\User');//here method name must match with foreign key like: owner() for'owner_id' otherwise declare foreign key parameter explicitely.
    }

}
