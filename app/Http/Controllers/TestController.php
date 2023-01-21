<?php


namespace App\Http\Controllers;


use App\Category;
use App\Country;
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
        $posts = Post::query()->get();
        if ($request->category_id) {
            $posts = Post::query()->where('category_id', $request->category_id)->get();
        }
        return view('news', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    public function addCategory()
    {
        return view('addCategory');
    }

    public function saveCategory(Request $request)
    {
        $newCategory = new Category();
        $newCategory->name = $request->addCategory;
        $newCategory->save();
        return redirect('/find');
    }

    public function addPosts()
    {
        $categories = Category::query()->get();
        return view('addPosts', [
            'categories' => $categories
        ]);
    }

    public function savePosts(Request $request)
    {
        $newPosts = new Post();
        $newPosts->title = $request->addPosts;
        $newPosts->category_id = $request->category_id;
        $newPosts->save();
        return redirect('/find');
    }
    public function findCountries(Request $request)
    {
        $countries = Country::query()->get();
        $people = isset($request->people) ? $request->people: 3000000;
        return view('countries', [
            'countries' => $countries,
            'people' => $people
        ]);
    }
}