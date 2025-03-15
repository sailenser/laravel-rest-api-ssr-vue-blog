<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function commentsPost(string $id) {
        try {
            $post = Posts::findOrFail($id);
            $comments = $post->comments;

            return response()->json([
                'res' => true,
                'data' => [
                    'comments' => $comments,
                ]
            ]);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['errorText' => 'Данный пост отстутсвует', 'res' => false], 400);
        }
    }
}
