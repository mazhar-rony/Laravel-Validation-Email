<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];
    
    protected $dates = ['date_of_birth'];//to format date_of_birth field in users.index file

    public function profile()
    {
        //here method name must match with foreign key like: owner() for'owner_id' otherwise declare foreign key parameter explicitely.
        return $this->hasOne('\App\Profile', 'owner_id');// here method is profile() so 'owner_id' is declare as foreign key parameter explicitely.
    }
}
