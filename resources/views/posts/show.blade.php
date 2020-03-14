@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100" style="max-width: 50px">
                    </div>
                    <div>
                        <p class="font-weight-bold"> {{ $post->user->username }}</p>
                    </div>
                </div>

                <hr>

                <p><span class="font-weight-bold">{{ $post->user->username }}</span> {{ $post->caption }}</p>

            </div>
        </div>
    </div>
</div>
@endsection