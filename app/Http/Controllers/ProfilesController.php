<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        return view('profiles.index', [
            'profiles' => Profile::all()
        ]);
    }

    public function edit($id)   
    {
        $profile = Profile::find($id);

        return view('profiles.edit', compact('profile'));
    }

    public function update($id)
    {
        $profile = Profile::find($id);
        
        $profile->update([
            'profile_pic' => request('profile_pic'),
            'bio' => request('bio'),
            'address' => request('address')
        ]);
        
        return redirect('/users/'.$profile->owner_id.'/show');
    }
}
