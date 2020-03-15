<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        // if user authentication to system show following method
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        //dd($follows);

        // passing user variables with compact to index.blade.php
        return view('profiles/index', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        // passing user variables with compact to edit.blade.pph
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        /*

        save method
        
        auth()->user()->profile()->create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'url'=>$data['url'],
        
        ]);
        
        */

        if (request('image')) {
            $imagePath = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // dd($data);

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
