<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Str; 
use Auth;

class FrontendController extends Controller
{
    //
    public function getHome(){
        $data['featured']=Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
        $data['news'] = Product::orderBy('prod_id','desc')->take(8)->get();
        return view('frontend.home',$data);

    }
    public function getDetail($id){
        $data['item'] = Product::find($id);
        $data['comments'] = Comment::where('com_product',$id)->get();
        return view('frontend.details',$data);
    }
    public function getCategory($id){
        $data['cateName'] = Category::find($id);
        $data['items'] = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(2);
        return view('frontend.category',$data);
    }
    public function postComment(Request $request,$id){
        $comment = new Comment;
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();
        return back();
    }
    public function getSearch(Request $request){
        $result = $request->result;
        $data['keyword'] = $result;
        $result = str_replace(' ','%',$result);
        $data['items'] = Product::where('prod_name','like','%'.$result.'%')->get();
        return view('frontend.search',$data);
    }
    public function getsignin(){
        return view('frontend.signin');
    }
    public function postsignin(Request $request){
        $arr = ['email' => $request->email, 'password' => $request->password];
        if($request->remember = 'Remember Me'){
            $remember = true;
        }else{
            $remember = false;
        }
        if(Auth::attempt($arr)){
            return redirect()->intended('/');
        }else{
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu chưa đúng');
        }
    }
    public function getLogoutHome(){
        Auth::logout();
        return redirect()->intended('/');
    }
    public function getSignUp(){
        return view('frontend.signup');
    }
    public function postSignUp(Request $request){      
        
        $user = new User;
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password =bcrypt ($request->password);
        $user->level = 3;
        if( $request->password == $request->passwordAgain){
            $user->save();
            return redirect('signin')->with('error','Chúc mừng bạn đã đăng ký thành công');
        }else{
            
            return redirect('signup')->with('error','Mật khẩu nhập lại không đúng');
        };
    }
}  
