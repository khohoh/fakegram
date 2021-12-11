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
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="ml-3">
                        @if(auth()->user()->id === $post->user->id)
                            <form action="/p/{{ $post->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">Delete Post</button>
                            </form>
                        @endif
                    </div>
                </div>

                <hr>

                <div>
                    <p>
                        {{-- <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span>  --}}
                        {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
