<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function adminIndex()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.admin-index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title, '-') . '-' . time();
        $data['user_id'] = Auth::id();
        $data['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'تم نشر المقال بنجاح');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->image) Storage::disk('public')->delete($post->image);
        $post->delete();
        return back()->with('success', 'تم حذف المقال');
    }


    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->get();
        return view('pages.learning', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('pages.single-post', compact('post'));
    }
}