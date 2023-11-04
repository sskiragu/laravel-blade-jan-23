<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles  = Role::pluck('name', 'name')->all();
        // $user_role = $user->roles->pluck('name', 'name')->all();
        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        $validated_input =  $request->validate([
            'name' => 'required | min:3',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6'
        ],
    [
            'name.required' => 'Please enter a username.',
            'name.min' => 'Username must be at least 3 characters long.',
            'name.unique' => 'Username is already taken.',
            'email.required' => 'Please enter an email address.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email address is already registered.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 6 characters long.',
    ]);
        User::create($validated_input);
        return redirect()->route('users.index')->with(['msg' => 'User added successfuly']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles  = Role::pluck('name', 'name')->all();
        $user_role = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'user_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // return dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles', []));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return $id;
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('msg', 'User deleted');
    }
}
