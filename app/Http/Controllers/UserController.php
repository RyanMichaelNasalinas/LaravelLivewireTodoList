<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use App\User;


class UserController extends Controller
{
    public function index()
    {
        // Using Raw query

        // DB::insert('INSERT into users (name,email,password) VALUES (?,?,?)', [
        //     'ryan', 'ryan@email.com', 'password'
        // ]);

        // DB::update("UPDATE users SET name = 'Ryan1', email = 'Ryan1@email.com',password = 'password1' WHERE id = 1");

        // DB::delete("DELETE FROM users WHERE id = 1");

        // $users = DB::select("SELECT * FROM users");

        // return $users; // Will automatically return JSON file

        // Using Eloquent

        // $user = new User();
        // $user->name = 'One';
        // $user->email = 'One@email.com';
        // $user->password = bcrypt('onepass');
        // $user->save();

        // User::where('id', 2)->delete();
        // User::where('id', 4)->update(['name' => 'Mr.One']);

        $data = [
            'name' => 'Mr.Three',
            'email' => 'three@email.com',
            'password' => 'password'
        ];

        // User::create($data);

        $user = User::all();

        // return $user;


        return view("home");
    }

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
            // Get the original filename instead of a hash filename, all of the function is in UserModel
            User::uploadAvatar($request->image);
            return redirect()->back()->with('message', 'Image Uploaded!');
        }
        return redirect()->back()->with('error', 'Error Uploading Image');
    }
}
