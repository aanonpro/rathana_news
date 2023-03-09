<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::all();
        $posts = Post::all();
        $users = User::count();
        return view('admin.dashboard',compact('categories','posts','users'));
    }
}
