<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get()->all();
        return view('backend.admin.users.list_users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'phone_number' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'emp_code' => 'required|string|max:10',
            'emp_date' => 'required|date',
            'status' => 'required|string',
            'user_level' => 'required|string',
        ]);

        $password = $this->generateRandomPassword(12); 

        $user = new User;
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->address = $validated['address'];
        $user->username = $validated['username'];
        $user->phone_number = $validated['phone_number'];
        $user->gender = $validated['gender'];
        $user->emp_code = $validated['emp_code'];
        $user->emp_date = $validated['emp_date'];
        $user->status = $validated['status'];
        $user->user_level = $validated['user_level'];
        $user->password = Hash::make($password);

        $user->save();

        return redirect()->route('users.index')->with('success',[
            'message' => 'User added successfully',
            'duration' => $this->alert_message_duration
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('backend.admin.users.update_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'status' => 'required|in:0,1',
            'user_level' => 'required|in:0,1,2',
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->username = $request->input('username');
        $user->phone_number = $request->input('phone_number');
        $user->gender = $request->input('gender');
        $user->emp_code = $request->input('emp_code');
        $user->emp_date = $request->input('emp_date');
        $user->status = $validated['status'];
        $user->user_level = $validated['user_level'];

        $user->update();

        return redirect()->route('users.index')->with('success', [
            'message' => 'User updated successfully',
            'duration' => $this->alert_message_duration
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    function generateRandomPassword($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        return substr(str_shuffle(str_repeat($characters, ceil($length / strlen($characters)))), 1, $length);
    }
    
}
