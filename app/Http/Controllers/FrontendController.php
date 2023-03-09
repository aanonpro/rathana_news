<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{   
    public function index(){
        // $category = Category::where('status', 1)->first();
        // foreach ($categories as $category) {
        //     if ($category->status= 1) {
        //         $posts = Post::orderBy('created_at','DESC')->with(['categories'=>function($query){
        //             return $query->where('status',1)->latest();
        //         }])->where('status', 1)->get();
        //     }
        // }

        // $posts = Post::leftJoin('categories', function($join) {
        //     $join->on('posts.category_id', '=', 'categories.id')
        //     ->where('categories.status','=',1);
        //   })
         
        //   ->first();
        

            $posts = Post::where('status',1)->orderBy('created_at','DESC')->latest()->get();
            // $categories = Category::where('status',1)->with(['posts' =>function($q){
            //     return $q->where('status',1)->latest()->get();
            // }])->get();
            // $posts = Post::where('status',1)->with(['category' => function($q){
            //     return $q->where('status',1)->latest()->get();
            // }])->orderBy('created_at','DESC')->latest()->get();

            $posts_random = Post::where('status', 1)->orderBy('created_at','DESC')->inRandomOrder()->get();
            $posts_random_bottom = Post::where('status', 1)->inRandomOrder()->limit(2)->get();
            $post_popular = Post::orderBy('views','DESC')->where('status',1)->latest()->get();
            $lastest_posts = Post::orderBy('id','DESC')->where('status',1)->latest()->get();

            // each category in index page 
            $categories = Category::where('status',1)->with(['posts' => function($query) {
                return $query->latest()->get();
            }])->where('status',1)->get(); 

            return view('frontend.index',compact('posts','posts_random','posts_random_bottom','post_popular','categories','lastest_posts'));
        
    }

    public function categoryPage(string $category_slug){
        $categories = Category::where('slug', $category_slug)->where('status','1')->first();
        if($categories){
            $posts = Post::where('category_id', $categories->id)->where('status','1')->orderBy('id','DESC')->paginate(12);
            $post_popular = Post::orderBy('views','DESC')->where('status',1)->get();
            // $popular_posts = Post::inRandomOrder()->take(3)->get();
            // $latest_posts = Post::where('status','0')->latest('created_at','DESC')->inRandomOrder()->get()->take(3);
            return view('frontend.cate-page', compact('categories','posts','post_popular'));
        }
        // else{
        //     return redirect('/');
        // }
    }

    public function viewPost(string $category_slug, string $post_slug){
        
              
      
        $categories = Category::where('slug', $category_slug)->where('status','1')->first();
      
        if($categories){
            Post::where('slug', $post_slug)->increment('views');    
            $posts = Post::where('category_id', $categories->id)->where('slug', $post_slug)->where('status','1')->first();
            $lastest_posts = Post::orderBy('id','DESC')->where('status',1)->latest()->get();
            $post_popular = Post::orderBy('views','DESC')->where('status',1)->get();
            $share =\Share::page(
                'http://127.0.0.1:8000/',
                'here is text',
            )
            ->facebook()
            ->telegram()
            ->linkedin()
            ->whatsapp()
            ->reddit()
            ->twitter()
            ->pinterest();
            return view('frontend.dedail', compact('posts','categories','post_popular','lastest_posts','share'));
        }
        // else{
        //     return redirect('/');
        // }
    }


    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }
}
