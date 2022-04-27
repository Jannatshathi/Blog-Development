<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    public function category(){
        return view('website.category');
    }

    public function contact(){
        return view('website.contact');
    }

    public function post($slug){
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        if($post){
            return view('website.post', compact('post'));
        }
        else{
            return redirect('/');
        }
        
    }
}
