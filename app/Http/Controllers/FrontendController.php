<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{   
    public function index(Request $request){
        // search with name and with name foreign keys
        $rows= Post::query();
        $cate= Category::query();

        if($request->search) {
                          
            $rows->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('meta_title','like','%'.$request->search.'%')
                ->Orwhere('meta_keyword','like','%'.$request->search.'%')
                ->get();
               
                $cate->where('name', 'like', '%' . $request->search . '%')->get();
           
         }

        $rows->where('status',1)->orderBy('created_at','DESC')->get();

        // $posts_random = Post::where('status', 1)->orderBy('created_at','DESC')->inRandomOrder()->get();
        // $posts_random_bottom = Post::where('status', 1)->inRandomOrder()->limit(2)->get();
        $post_popular = Post::orderBy('views','DESC')->where('status',1)->get();
        $lastest_posts = $rows->orderBy('id','DESC')->where('status',1)->latest()->get();
        $posts = $rows->latest()->get();

        // $cate->where('status', 1)->with('posts');
        $cate->where('status',1)->with(['posts' => function($query) {
            return $query->latest()->get();           
        }])->where('status',1); 
        $categories= $cate->latest()->get();

        return view('frontend.index',compact('posts','post_popular','categories','lastest_posts'));
        
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
        else{
            return view('frontend.crash_page');
        }
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
        else{
            return view('frontend.crash_page');
        }
    }


    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }
}
