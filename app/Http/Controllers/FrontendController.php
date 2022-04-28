<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
        //laravel collection
        //$chunk = $collection->splice(2, 1);----demo example
        $firstPost2 = $posts->splice(0, 2);
        $middlePost = $posts->splice(0, 1);
        $lastPosts = $posts->splice(0);

        $footerPosts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
        $firstFooterPost = $footerPosts->splice(0, 1);
        $middleFooterPost2 = $footerPosts->splice(0, 2);
        $lastFooterPost = $footerPosts->splice(0, 1);

        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->simplePaginate(9);

        return view('website.home', compact(['posts', 'recentPosts', 'firstPost2', 'middlePost', 'lastPosts', 
        'footerPosts', 'firstFooterPost', 'middleFooterPost2', 'lastFooterPost']));
    }

    public function about(){
        return view('website.about');
    }

    public function category($slug){
        $category = Category::where('slug', $slug)->first();
        if($category){
            $posts = Post::where('category_id', $category->id)->paginate(9);

            return view('website.category', compact(['category', 'posts']));
        }else {
            return redirect()->route('website');
        }
    }

    public function contact(){
        return view('website.contact');
    }

    public function post($slug){
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();

        // More related posts
        $relatedPosts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
        $middleRelatedPost = $relatedPosts->splice(0, 1);
        $firstRelatedPosts2 = $relatedPosts->splice(0, 2);
        $lastRelatedPost = $relatedPosts->splice(0, 1);

        $categories = Category::all();
        $tags = Tag::all();
        if($post){
            return view('website.post', compact(['post', 'posts', 'categories', 'tags', 'middleRelatedPost', 'firstRelatedPosts2', 'lastRelatedPost']));
        }
        else{
            return redirect('/');
        }
        
    }
}
