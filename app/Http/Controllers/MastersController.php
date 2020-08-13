<?php

namespace App\Http\Controllers;

use App\Post;
use App\Role;
use App\User;
use Carbon\Carbon;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MastersController extends Controller
{
    public function index()
    {
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }

        $role = Role::find(auth()->user()->role_id);
        // dd($role);
        if($role->name == 'master'){
            $users = DB::table('users')->distinct()->get();
            $posts = DB::table('posts')->distinct()->get();

            return view('pages.master.master')->with('users', $users)->with('posts', $posts);
        }
        return redirect(url(''))->with('error', 'Unauthorized Attempt!');
    }

    public function users()
    {
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }

        $role = Role::find(auth()->user()->role_id);
        // dd($role);
        if($role->name == 'master'){
            $users = DB::table('roles')
            ->join('users', 'users.role_id', '=', 'roles.id')
            // ->where('roles.name', 'master')
            ->select('users.*', 'roles.display_name')
            ->paginate(5);
            // dd($users);

            return view('pages.master.users')->with('users', $users);
        }
        return redirect(url(''))->with('error', 'Unauthorized Attempt!');
    }

    public function upgrade()
    {
        $id = intval($_GET['id']);
        $normal = DB::table('roles')->where('name', 'user')->first();
        $master = DB::table('roles')->where('name', 'master')->first();

        $user = User::find($id);

        // Check for correct user
        if( (auth()->user()->role_id != $master->id) ){
            return redirect(url('/dashboard'))->with('error', 'Unauthorized Attempt!');
        }
        if($user->role_id != $normal->id){
            return redirect(url('/dashboard'))->with('error', 'Unauthorized Attempt!');
        }

        $user->role_id = $master->id;
        $user->save();

        return redirect(url('/master/users'))->with('success', 'User Upgraded');
    }

    public function list()
    {
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }

        $role = Role::find(auth()->user()->role_id);
        // dd($role);
        if($role->name == 'master'){
            $list = DB::table('posts')->where('validity', '>', Carbon::now()->toDateTimeString())->orderBy('created_at', 'desc')->paginate(5);
// dd($list);
            return view('pages.master.posts.list')->with('list', $list);
        }
        return redirect(url(''))->with('error', 'Unauthorized Attempt!');
    }

    public function show($id)
    {
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }
        $role = Role::find(auth()->user()->role_id);
        if($role->name == 'master'){
            $post = Post::find($id);
            $gallery = DB::table('galleries')->where('post_id', $post->id)->get();

            $config['center'] = $post->latitude . ',' . $post->longitude;
            $config['position'] = $post->latitude . ',' . $post->longitude;
            $config['zoom'] = '15';
            $config['map_height'] = '500px';
            $config['scrollwheel'] = true;
            $gmap = new GMaps();
            $gmap->initialize($config);
            $gmap->add_marker($config);
            $map = $gmap->create_map();


            return view('pages.master.posts.show')->with('post', $post)->with('gallery', $gallery)->with('map', $map);
        }
        return redirect(url(''))->with('error', 'Unauthorized Attempt!');
    }

    public function update(Request $request, $id)
    {
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }
        $role = Role::find(auth()->user()->role_id);
        if($role->name == 'master'){
            $post = Post::find($id);

            return view('pages.master.posts.show')->with('post', $post);
        }
        return redirect(url(''))->with('error', 'Unauthorized Attempt!');
    }


    public function expired()
    {
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }

        $role = Role::find(auth()->user()->role_id);
        // dd($role);
        if($role->name == 'master'){
            $list = DB::table('posts')->where('validity', '<', Carbon::now()->toDateTimeString())->orderBy('created_at', 'desc')->paginate(5);

            return view('pages.master.posts.list')->with('list', $list);
        }
        return redirect(url(''))->with('error', 'Unauthorized Attempt!');
    }
}
