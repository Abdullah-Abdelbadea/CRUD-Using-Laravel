<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User ::all();
        return view('posts.create' ,['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'title' =>'required|max:255|min:3',
            'description' =>'required|min:15',
            'posted_by' =>'required|integer',
            
        ]);
       $data = request()->all();
       $post = new Post();
       $post->title = $data['title'];
       $post->description = $data['description'];
       $post->posted_by = $data['posted_by'];
       $post->save();
       return  to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $user_edited = User::find($post->Posted_by);
        $users = User ::all();
        return view('posts.edit', ['post' => $post , 'user_edited' =>$user_edited ,'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post)
    {
        request()->validate([
            'title' =>'required|max:255|min:3',
            'description' =>'required|min:15',
            'posted_by' =>'required|integer',
            
        ]);
        $data = request()->all();
       $post->title = $data['title'];
       $post->description = $data['description'];
       $post->posted_by = $data['posted_by'];
       $post->update();
        return  to_route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
    public function softdeleted(){
        $postFromDB = Post::onlyTrashed()->get();
        return view('posts.softdeleted',['posts'=>$postFromDB ]);
    }
    public function restore($id){
        $post = Post::onlyTrashed()->where('id',$id)->first();
        $post->restore();
        $postFromDB = Post::onlyTrashed()->get();
        return view('posts.softdeleted',['posts'=>$postFromDB ]);
    }
    public function forcedelete($id){
        $post = Post::onlyTrashed()->where('id',$id)->first();
        $post->forceDelete();
        $postFromDB = Post::onlyTrashed()->get();
        return view('posts.softdeleted',['posts'=>$postFromDB ]);
    }
}
