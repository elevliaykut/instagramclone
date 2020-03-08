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
        return view('profile.edit',compact('user'));
    }
}
