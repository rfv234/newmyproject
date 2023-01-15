<?php


namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;
use App\Post;

class TestController extends Controller
{
    public function index()
    {
        $category = Category::query()->first();
        dd($category->posts->pluck('title'));
    }

    public function findPosts(Request $request)
    {
        $categories = Category::query()->get();
        $posts=Post::query()->get();
        if ($request->category_id)
        {
            $posts=Post::query()->where('category_id', $request->category_id)->get();
        }
        return view('news', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}