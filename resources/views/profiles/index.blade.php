@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://instagram.fbtz1-1.fna.fbcdn.net/v/t51.2885-19/s150x150/83037556_621095101795025_4514207238813908992_n.jpg?_nc_ht=instagram.fbtz1-1.fna.fbcdn.net&_nc_ohc=i0VND3GNJJ8AX_zEGxF&oh=cd8f424153593a7615c06d6d3f9e3140&oe=5E887011" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ auth()->user()->username }}</h1>
                <a href="/p/create">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>296</strong> followers</div>
                <div class="pr-5"><strong>278</strong> following</div>
            </div>
            <div>
                <div class="pt-2 pb-2"><strong>Aykut Elevli</strong></div>
                <div>- Lublin University Of Technology</div>
                <div>- Computer Engineering</div>
                <div>- Citizen of the world 🇹🇷🇳🇱🇫🇷🇧🇪🇩🇪🇭🇺🇸🇰🇵🇹🇪🇸🇦🇹🇱🇹🇳🇴🇺🇦🇨🇿</div>
                <div><a href="https://aykutelevli.me/">aykutelevli.me</a></div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection