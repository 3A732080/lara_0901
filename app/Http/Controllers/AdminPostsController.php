<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->get();
        $data = [
            'posts' => $posts,
        ];
        return view('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        $posts = Post::find($id);
        $data = [
            'posts' => $posts,
        ];
        return view('admin.posts.edit', $data);
    }

    public function store(Request $request)
    {
        Post::creat($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function update(Request $request,$id)
    {
        $posts = Post::find($id);
        $posts->update($request->all());
        return redirect()->route('admin.posts.index');
    }
}
