<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'name' => 'required|string|max:255|min:3|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',             // Minimum 8 characters
                'regex:/[a-z]/',      // Must contain at least one lowercase letter
                'regex:/[A-Z]/',      // Must contain at least one uppercase letter
                'regex:/[0-9]/',      // Must contain at least one digit
            ],
        ]);
        
       $data = request()->all();
       $user = new User();
       $user->name = $data['name'];
       $user->email = $data['email'];
       $user->password = $data['password'];
       $user->save();
       return  redirect()->back()->with('msg','Added Successfully....');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
       
        return view('users.show',compact('user' ));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
    
        request()->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => [
                'required',
                'string',
                'min:8',             // Minimum 8 characters
                'regex:/[a-z]/',      // Must contain at least one lowercase letter
                'regex:/[A-Z]/',      // Must contain at least one uppercase letter
                'regex:/[0-9]/',      // Must contain at least one digit
            ],
        ]);
        
       $data = request()->all();
       $user->name = $data['name'];
       $user->email = $data['email'];
       $user->password = $data['password'];
       $user->update();
       return  to_route('users.index')->with('msg','Updated Successfully....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('msg','Deleted Successfully....');
    }
}
