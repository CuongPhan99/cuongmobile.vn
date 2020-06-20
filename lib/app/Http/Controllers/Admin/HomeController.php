<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Comment;
use App\User;
use App\Models\Order;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function getHome(){
        $product_count = Product::count();
        $order_count = Order::count();
        $user_count = User::count();
        $category_count = Category::count();
        return view('backend.index',compact('product_count','order_count','user_count','category_count'));
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }   
}
