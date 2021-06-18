<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(){
        return response(Post::all()); 
    }

    public function store(Request $request){
        $Post = new Post([
            'caption' => $request->caption, 
            'category_id' => $request->category_id, 
            'author_id' => Auth::id()
        ]); 
        $Post->save(); 
        return response($Post, 200);
    }

    public function edit(Request $request, $PostId){
        $Post = Post::findOrFail($PostId); 
        $Post->fill($request->input())->save(); 
        return response($Post,201); 
    }

    public function destroy(Request $request, $PostId){
        $Post = Post::findOrFail($PostId)->delete(); 
        return response("success",202);
    }
}
