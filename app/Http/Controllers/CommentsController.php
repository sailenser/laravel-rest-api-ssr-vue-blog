<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function commentsPost(string $id) {
        try {
            $post = Posts::findOrFail($id);
            $commentsPost = $post->comments()->with(['user' => function($query) {
                $query->select('id', 'name');
            }])->get();

            return response()->json([
                'res' => true,
                'data' => [
                    'comments' => $commentsPost,
                ]
            ]);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['errorText' => 'Данный пост отстутсвует', 'res' => false], 400);
        }
    }
}
