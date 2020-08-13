<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    // Root URL redirect page setup
    public function index(){
        return view('pages.home.index');
    }

    public function about(){
        return view('pages.home.about');
    }

    public function show($id){
        $post = DB::table('posts')->where('id', $id)->where('status', 'PUBLISHED')->where('validity', '>', Carbon::now()->toDateTimeString())->first();
        $gallery = DB::table('galleries')->where('post_id', $post->id)->where('author_id', $post->author_id)->distinct()->get();
        $user = DB::table('users')->where('id', $post->author_id)->first();

        $config['center'] = $post->latitude . ',' . $post->longitude;
        $config['position'] = $post->latitude . ',' . $post->longitude;
        $config['zoom'] = '15';
        $config['map_height'] = '500px';
        $config['scrollwheel'] = true;
        $gmap = new GMaps();
        $gmap->initialize($config);
        $gmap->add_marker($config);
        $map = $gmap->create_map();

        return view('pages.home.show')->with('post', $post)->with('user', $user)->with('gallery', $gallery)->with('map', $map);
    }

    public function search(){
        $posts = DB::table('posts')->where('status', 'PUBLISHED')->where('validity', '>', Carbon::now()->toDateTimeString())->distinct()->get();

        return view('pages.home.search')->with('posts', $posts);
    }

    public function dashboard(){
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }


        $posts = DB::table('posts')->where('author_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(5);
        // dd($posts);

        return view('pages.home.dashboard')->with('posts', $posts);
    }
}
