<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $users = auth()->user()->following()->pluck('profiles.user_id');

        // $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        $user = auth()->user();

        $posts = Post::latest()->paginate(9);

        return view('posts.index', compact('posts', 'user'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // $data = request()->validate([
        //     'caption' => 'required',
        //     'image' => 'required|image',
        // ]);

        $data = $request->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        // $imagePath = request('image')->store('uploads', 'public');
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        $imagePath = $request->file('image')->storeAs('/uploads', $fileNameToStore);
        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image = Image::make($request->file('image')->getRealPath())->fit(1200, 1200);
        $image->save('storage/uploads/'.$fileNameToStore);

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' .auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('/posts.show', compact('post'));
    }
}
