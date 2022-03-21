<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return Post::all();
    }
    public function store(Request $request){
        try {
          $post = new Post();
          $post->title = $request->title;
          $post->body = $request->body;
          if($post->save()){
              return response()->json(["status" => 'success', "message" => "Post succefully created"]);
          }
        } 
        catch (\Throwable $th) {
            return response()->json(["status" =>'error', "message" => $th->getMessage()]);
        }
    }
    public function edit(Request $request, $id){
        try {
          $post = Post::findOrFail($id);
          $post->title = $request->title;
          $post->body = $request->body;
          if($post->save()){
              return response()->json(["status" => 'success', "message" => "Post updated succefully"]);
          }
        } 
        catch (\Throwable $th) {
            return response()->json(["status" =>'error', "message" => $th->getMessage()]);
        }
    }
    public function destory($id){
        try {
          $post = Post::findOrFail($id);
          if($post->delete()){
              return response()->json(["status" => 'success', "message" => "Post delete succefully"]);
          }
        } 
        catch (\Throwable $th) {
            return response()->json(["status" =>'error', "message" => $th->getMessage()]);
        }
    }
}
