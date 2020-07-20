<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Rules\MaxValue100;
use Illuminate\Http\Request;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        /*
        return view('users.index', [
            'users' => User::all()
        ]);
        */

        // for pagination
        return view('users.index', [
            'users' => User::paginate(1)
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('users.profile', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        // Approach 1 Validation
        /*request()->validate([
            'firstname' => ['required','min:3','max:20'], // you can do this within array
            'lastname' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users',// here users = db table name
            'phone' => 'required',
            'exam_score' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'user_name' => 'required|alpha_num|unique:users',// here users = db table name
            'password' =>'required|confirmed' // the confirm password field name must be "password_confirmation"
            
        ],[
            'firstname.required' => 'You have To Provide First Name :)',
            'firstname.min' => 'Minimum 3 Character Have To Provide !!',
            'email.unique' => 'Duplicate Email',
            'user_name.unique' => 'Pls Choose Another User Name'
        ]);
        */


        $rules = [
            'firstname' => ['required','min:3','max:20'], // you can do this within array
            'lastname' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users',// here users = db table name
            'phone' => 'required',
            'exam_score' => ['required','numeric', new MaxValue100],// applied custom Validation & custom validation must declare in array.
            'date_of_birth' => 'required|date',
            'user_name' => 'required|alpha_num|unique:users',// here users = db table name
            'password' =>'required|confirmed' // the confirm password field name must be "password_confirmation"
            
        ];
        
        $messages = [
            'firstname.required' => 'You have To Provide First Name :)',
            'firstname.min' => 'Minimum 3 Character Have To Provide !!',
            'email.unique' => 'Duplicate Email',
            'user_name.unique' => 'Pls Choose Another User Name'
        ];

        //request()->validate($rules, $messages);// 1st way

        //$request->validate($rules, $messages);// 2nd way

        //$validator = Validator::make($request->all(),$rules,$messages);// 3rd way here Validator shows the exceptions & can't redirect page

        // (for 3rd way) check validation if fails redirect to back page as a blank form 
        /*if($validator->fails())
        {
            return back();
        }*/

        // (for 3rd way) check validation if fails redirect to back page with validation error messages
        /*if($validator->fails())
        {
            return back()->withErrors($validator);
        }*/
		
		// (for 3rd way) check validation if fails redirect to back page with validation error messages and with old field values
        /*if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();// here withInput() is old() value of input field
        }*/

        $validator = Validator::validate($request->all(),$rules,$messages);// this line fullfills the whole 3rd way
        
        User::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'phone' => request('phone'),
            'exam_score' => request('exam_score'),
            'date_of_birth' => request('date_of_birth'),
            'user_name' => request('user_name'),
            'password' => Hash::make(request('password'))

        ]);

        
        return redirect('/users');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);

        $rules = [
            'firstname' => ['required','min:3','max:20'], // you can do this within array
            'lastname' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,id,{$id}',// here users = db table name & id = column name and id,{$id} is escaping unique validation for that row while in edit form.
            'phone' => 'required',
            'exam_score' => ['required','numeric', new MaxValue100],// applied custom Validation & custom validation must declare in array.
            'date_of_birth' => 'required|date',
            'user_name' => 'required|alpha_num|unique:users,id,{$id}',// here users = db table name & id = column name and id,{$id} is escaping unique validation for that row while in edit form.
            'password' =>'required|confirmed' // the confirm password field name must be "password_confirmation"
            
        ];

        request()->validate($rules);

        $user->update([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'phone' => request('phone'),
            'exam_score' => request('exam_score'),
            'date_of_birth' => request('date_of_birth'),
            'user_name' => request('user_name'),
            'password' => Hash::make(request('password'))
        ]);

        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return back();
    }

    public function sendMail()
    {
        return view('mails.confirmation');
    }

    public function sendingMail()
    {
        request()->validate([
            'email_to' => 'required|email',
            'email_body' => 'required'
        ]);

        $to = request('email_to');
        $body = request('email_body');

        // Sending Process

        $obj = new \stdClass();
        $obj->message = $body;

        Mail::to($to)->send(new ConfirmationEmail($obj));// here ConfirmationEmail($obj) is mailable Object takes object parameter

        return back();
    }

}
