@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 p-5 mt-2">
            <div class="d-flex align-items-center pb-2">
                <div class="h4">{{ $user->username }}</div>
                @if(auth()->user()->id != $user->id)
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" class="pb-1"></follow-button>
                @endif
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
            {{-- <div><a href="#">{{ $user->profile->url }}</a></div> --}}
        </div>
    </div>

    <!-- Posted Images -->
    <div class="row pt-5">
        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
