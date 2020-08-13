<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }
        // Check for correct user
        if(auth()->user()->id !== $user->id){
            return redirect(url('/users'))->with('error', 'Unauthorized Attempt!');
        }

        return view('auth.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'nullable',
            'password2' => 'nullable',
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10300']
        ]);

        $user = User::find($id);
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }
        // Check for correct user
        if(auth()->user()->id !== $user->id){
            return redirect(url('/users'))->with('error', 'Unauthorized Attempt!');
        }

        if($request->input('password') == $request->input('password2')){
            $avatar = auth()->user()->avatar;
            $old = auth()->user()->avatar;
            if($request->hasFile('avatar')){
                $avatar = 'users/' . uniqid() . '/' . $request->avatar->getClientOriginalName();
                $path = $request->file('avatar')->storeAs('public', $avatar);
                Image::make(getcwd() . '/storage/' . $avatar)->fit(500, 500)->save(getcwd() . '/storage/' . $avatar, 60);

                $user->avatar = $avatar;
                if($old != 'users/default.png'){
                    if(!Storage::deleteDirectory('public/' . substr($old, 0, strripos($old, "/")))){
                        return redirect(url('/dashboard'))->with('error', 'Error 404! Cover image not founded.');
                    }
                }
            }
            if($request->input('password')){
                $user->password = Hash::make($request->input('password'));
            }
            $user->save();



            return redirect(url('/dashboard'))->with('success', 'User Profile Updated');
        }
        else{
            return redirect(url('/dashboard'))->with('error', 'Password Did Not Matched');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
