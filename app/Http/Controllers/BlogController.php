<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::when(request("keyword"),function($q){
            $keyword = request('keyword');
            $q->where("title","like","%$keyword%")->orWhere("description","like","%$keyword%");
        })->paginate(5)->withQueryString();
        return view('blog.index',compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(StoreBlogRequest $request)
    {
        Blog::create([
            'title' =>  $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('blog.index')->with('status','New Post is Created');
    }

    public function show(Blog $blog)
    {
        return view('blog.show',compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view("blog.edit",compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->update();

        return redirect()->route('blog.index')->with('status','Post is Updated');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with("status",'Blog is Deleted');
    }
}
