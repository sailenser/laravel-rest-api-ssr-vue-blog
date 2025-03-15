<?php

namespace App\Http\Controllers;

use App\Models\CategoryPosts;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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
}
