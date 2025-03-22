<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Validator;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostsController extends Controller
{
    public function index() {
        try {
            $posts = Posts::all();
            return response()->json(['res' => true, 'data' => $posts])
                ->header('Content-Type', 'application/json');
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['errorText' => 'Не удалось получить список всех постов', 'res' => false], 400)
                ->header('Content-Type', 'application/json');
        }
    }

    public function one(string $id) {
        try {
            $post = Posts::findOrFail($id);
            return response()->json([
                'res' => true,
                'data' => ['id' => $id, 'url' => $post->url, 'title' => $post->title, 'contents' => $post->contents]
            ]);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['errorText' => 'Данный пост отстутсвует', 'res' => false], 400);
        }
    }

    public function createPost() {
        if (!auth()->user()) {
            return response()->json(['error' => 'Unauthorized', 'res' => false], 401);
        }

        $validator = Validator::make(request()->all(), [
            'url' => 'required',
            'title' => 'required',
            'contents' => 'required',
            'category_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['errorText' => $validator->errors(), 'res' => false], 422);
        }

        $post = new Posts;
        $post->url = request()->url;
        $post->title = request()->title;
        $post->user_id = 1;
        $post->contents = request()->contents;
        $post->category_id = request()->category_id;
        $post->save();

        return response()->json([
            'res' => true,
            'data' => ['id' => $post->id,  'title' => $post->title, 'contents' => $post->contents]
        ], 201);
    }

    public function updatePost(string $id) {
        if (!auth()->user()) {
            return response()->json(['error' => 'Unauthorized', 'res' => false], 401);
        }

        $validator = Validator::make(request()->all(), [
            'url' => 'required',
            'title' => 'required',
            'contents' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['errorText' => $validator->errors(), 'res' => false], 422);
        }

        $post = Posts::findOrFail($id);

        $post->url = request()->url;
        $post->title = request()->title;
        $post->user_id = 1;
        $post->contents = request()->contents;
        $post->save();

        return response()->json([
            'res' => true,
            'data' => ['id' => $id, 'url' => $post->url, 'title' => $post->title, 'contents' => $post->contents]
        ], 201);
    }

    public function deletePost($id)
    {
        if (!auth()->user()) {
            return response()->json(['error' => 'Unauthorized', 'res' => false], 401);
        }

        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }

        $post->delete();

        return response()->json([
            'res' => true,
            'data' => 'Post deleted successfully',
        ], 200);
    }
}
