<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        // passing user variables with compact to index.blade.php
        return view('profiles/index', compact('user'));
    }

    public function edit(User $user)
    {
        // passing user variables with compact to edit.blade.pph
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title'=> 'required',
            'description'=> 'required',
            'url' => 'url',
            'image' => '',
        ]);

        // dd($data);
        
        // save method
        
        auth()->user()->profile()->create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'url'=>$data['url'],
        ]);

        auth()->$user->profile->update($data);
        return redirect("/profile/{$user->id}");
    }
}
