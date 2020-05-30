<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function getHome(){
        $product_count = Product::count();
        $comment_count = Comment::count();
        $user_count = User::count();
        $category_count = Category::count();
        return view('backend.index',compact('product_count','comment_count','user_count','category_count'));
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }   
}
