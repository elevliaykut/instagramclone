<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        dd(request('image')->store('uploads','public')); //store image under the path: store/public/uploads

        auth()->user()->posts()->create($data);

        dd(request()->all()); // see all data from form in the array.
    }
}
