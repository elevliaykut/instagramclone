<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //need to authorization
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public'); //store image under the path: store/public/uploads

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        // dd(request()->all()); // see all data from form in the array.

        return redirect('/profile/' .auth()->user()->id); // redirect url
    }

    // Eğer böyle bir post id varsa göster

    public function show(\App\Post $post)   
    {
        // Compact burda eğer böyle bir id' ye sahip post varsa show.blade.php yi döndür.

        return view('posts.show', compact('post'));
    }
}
