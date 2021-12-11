@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="/storage/profile/images.png" class="rounded-circle w-100">
            </div>
            <div class="col-9 p-5">
                <div class="d-flex align-items-center pb-2">
                    <div class="h4">Username</div>
                    <button type="button" class="btn btn-primary btn-sm ml-3 mb-2">
                        <a href="/login" class="text-white">My Profile</a>
                    </button>
                </div>            
                
                <a href="/login" class="mr-3">Add New Post</a>
                <a href="/login">Edit Profiles</a>                    
                    
                <div class="d-flex">
                    <div class="pr-5"><strong>00</strong> posts</div>
                    <div class="pr-5"><strong>00</strong> followers</div>                
                    <div class="pr-5"><strong>00</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold">Join Us</div>
                <div>
                    to share your good memories.                                   
                </div>
            </div>
        </div>


        <div class="row">
            @foreach ($posts as $post)
                    <div class="col-4">
                        <a href="/login">
                            <img src="/storage/{{ $post->image }}" class="w-100">
                        </a>
                        <p class="d-flex justify-content-center">
                            <span class="font-weight-bold mr-2">
                                <a href="/login">
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