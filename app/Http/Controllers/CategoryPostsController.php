<?php

namespace App\Http\Controllers;

use App\Models\CategoryPosts;
use App\Models\Posts;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryPostsController extends Controller
{
    public function index() {
        try {
            $posts = CategoryPosts::all();
            return response()->json(['res' => true, 'data' => $posts]);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['errorText' => 'Не удалось получить список категорий', 'res' => false], 400);
        }
    }

    public function categoryPostsOne(string $id) {
        //return response()->json(['res' => true, 'idCategory' => $id]);
        try {
            $categoryOne = CategoryPosts::findOrFail($id);
            $postsCategory = $categoryOne->allPosts;

            return response()->json([
                'res' => true,
                'data' => $postsCategory
            ]);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['errorText' => 'Данный пост отстутсвует', 'res' => false], 400);
        }
    }
}
