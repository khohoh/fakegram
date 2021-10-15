@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex align-items-center pb-2">
                <div class="h4">{{ $user->username }}</div>
                <button type="button" class="btn btn-primary ml-3 mb-2">
                    <a href="/profile/{{ $user->profile->id }}" class="text-white">My Profile</a>
                </button>
            </div>
        
            @auth
                @if(auth()->user()->id == $user->id)
                    <a href="/p/create" class="mr-3">Add New Post</a>
                    <a href="/profile/{{ $user->id }}/edit">Edit Profiles</a>                    
                @endif
            @endauth

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>                
                <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>
                {{ $user->profile->description }}                
            </div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <!-- Posted Images -->
    <div class="row">
        @foreach ($posts as $post)
                <div class="col-4">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100">
                    </a>
                    <p class="d-flex justify-content-center">
                        <span class="font-weight-bold mr-2">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span> 
                        {{ $post->caption }}
                    </p>
                </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
