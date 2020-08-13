<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Post;
use App\User;
use Carbon\Carbon;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->where('status', 'PUBLISHED')->where('validity', '>', Carbon::now()->toDateTimeString())->paginate(5);
        // dd($posts);
        return view('pages.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }

        $config['center'] = '24.358962948371033, 88.61004527768489';
        $config['zoom'] = '16';
        $config['map_height'] = '500px';
        $marker = array();
        $marker['geocodeCaching'] = true;
        $marker['position'] = '24.358962948371033, 88.61004527768489';
        $marker['draggable'] = true;
        $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
        $gmap = new GMaps();
        $gmap->initialize($config);
        $gmap->add_marker($marker);

        $map = $gmap->create_map();

        return view('pages.posts.create')->with('map', $map);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Login testing
        if(auth()->guest()){
            return redirect(url(''))->with('error', 'Unauthorized Attempt!');
        }

        $user = User::find(auth()->user()->id);
        if( ! $user->status ){
            return redirect(url('/dashboard'))->with('error', 'You can not add new post until your previous post gets approved / removed.');
        }

        $this->validate($request, [
            // 'author_id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10300|required',
            // 'status' => 'required',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable|max:52000',
            'option' => 'required',
            'category' => 'required',
            'price_flag' => 'required',
            'price' => 'required',
            'area' => 'nullable',
            'road' => 'nullable',
            'location_flag' => 'required',
            'division' => 'required',
            'district' => 'required',
            'city' => 'required',
            'partial' => 'required',
            'ward' => 'required',
            'url' => 'nullable',
            'bedroom' => 'nullable',
            'bathroom' => 'nullable',
            'corridor' => 'nullable',
            'kitchen' => 'nullable',
            'floor' => 'nullable',
            'parking' => 'nullable',
            'drawing' => 'nullable',
            'dining' => 'nullable',
            'advance' => 'nullable',
            'availability' => 'required',
            // 'validity' => 'required',
            'address' => 'nullable',
            'seat_type' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'map_status' => 'required'
        ]);

        // Handle File Upload
        if($request->hasFile('image')){
            $imageName = 'posts/' . auth()->user()->id . '/' . uniqid() . '/' . $request->image->getClientOriginalName();
            $path = $request->file('image')->storeAs('public', $imageName);
            $image = Image::make(getcwd() . '/storage/' . $imageName)->fit(1440, 962)->save(getcwd() . '/storage/' . $imageName, 60);
        } else{
            $fileNameToStore = 'posts/noImage.jpg';
        }

        // Create Post
        $post = new Post;
        $post->author_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->image = $imageName;
        $post->slug = $request->input('title');
        $post->status = 'PENDING';
        $post->option = $request->input('option');
        $post->category = $request->input('category');
        $post->price_flag = $request->input('price_flag');
        $post->price = $request->input('price');
        $post->area = $request->input('area');
        $post->road = $request->input('road');
        $post->location_flag = $request->input('location_flag');
        $post->division = $request->input('division');
        $post->district = $request->input('district');
        $post->city = $request->input('city');
        $post->partial = $request->input('partial');
        $post->ward = $request->input('ward');
        $post->url = $request->input('url');
        $post->bedroom = $request->input('bedroom');
        $post->bathroom = $request->input('bathroom');
        $post->corridor = $request->input('corridor');
        $post->kitchen = $request->input('kitchen');
        $post->floor = $request->input('floor');
        $post->parking = $request->input('parking');
        $post->drawing = $request->input('drawing');
        $post->dining = $request->input('dining');
        $post->advance = $request->input('advance');
        $post->availability = $request->input('availability');
        $post->validity = Carbon::now()->addDays(30);
        $post->address = $request->input('address');
        $post->seat_type = $request->input('seatType');
        $post->latitude = $request->input('latitude');
        $post->longitude = $request->input('longitude');
        // dd($request->input('longitude'));
        $post->map_status = $request->input('map_status');
        // $post->validity = $request->input('validity');
        $post->save();

        // Gallery Image Upload
        if($request->gallery){
            foreach($request->gallery as $image){
                $imageName = 'posts/gallery/' . auth()->user()->id . '/' . $post->id . '/' . uniqid() . '/' . $image->getClientOriginalName();
                $path = $image->storeAs('public', $imageName);
                $image = Image::make(getcwd() . '/storage/' . $imageName)->fit(1440, 962)->save(getcwd() . '/storage/' . $imageName, 60);

                $gallery = new Gallery;
                $gallery->post_id = $post->id;
                $gallery->author_id = $post->author_id;
                $gallery->image = $imageName;
                $gallery->save();
            }
        }

        // $user = User::find(auth()->user()->id);
        $user->status = 0;
        $user->save();

        return redirect(url('/dashboard'))->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $user = User::find($post->author_id);
        $gallery = Gallery::where("post_id", $post->id)->get();

        // Login testing
        if(!auth()->guest() && $post->author_id == auth()->user()->id){
            $config['center'] = $post->latitude . ',' . $post->longitude;
            $config['position'] = $post->latitude . ',' . $post->longitude;
            $config['zoom'] = '15';
            $config['map_height'] = '500px';
            $config['scrollwheel'] = true;
            $gmap = new GMaps();
            $gmap->initialize($config);
            $gmap->add_marker($config);
            $map = $gmap->create_map();

            return view('pages.posts.show')->with('post', $post)->with('gallery', $gallery)->with('user', $user)->with('map', $map);
        }
        return redirect(url(''))->with('error', 'Unauthorized Attempt!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $gallery = Gallery::where("post_id", $post->id)->get();

        // Check for correct user
        if( (auth()->user()->id != $post->author_id) ){
            return redirect(url('/dashboard'))->with('error', 'Unauthorized Attempt!');
        }

        // dd('public/' . substr($post->image, 0, strripos($post->image, "/")), 'public/posts/gallery/' . $post->author_id . '/' . $post->id);


        if($post->image != 'posts/noImage.jpg'){
            if(!Storage::deleteDirectory('public/' . substr($post->image, 0, strripos($post->image, "/")))){
                // return redirect(url('/dashboard'))->with('error', 'Error 404! Cover image not founded.');
            }
            if(!Storage::deleteDirectory('public/posts/gallery/' . $post->author_id . '/' . $post->id)){
                // return redirect(url('/dashboard'))->with('error', 'Error 404! Gallery images not founded.');
            }

        }


        // $post->delete();

        $user = User::find($post->author_id);
        $user->status = 1;
        $user->save();

        return redirect(url('/dashboard'))->with('success', 'Post Removed');
    }
}
