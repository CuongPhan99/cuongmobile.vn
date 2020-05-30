<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Models\User;
use DB;

class UserController extends Controller
{
    //
    public function getUser(){
        $data['userlist'] = DB::table('mc_users') ->orderBy('id','desc')->get();
        return view('backend.user',$data);
    }
    public function getAddUser(){
        return view('backend.adduser');
    }
    public function postAddUser(AddUserRequest $request){
        $user = new User;
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->level = $request->level;
        $user->save();
        return back();
    }
    public function getEditUser($id){
        $data['user'] = User::find($id);
        return view('backend.edituser',$data);
    }
    public function postEditUser(Request $request,$id){
        $user = new User;
        $arr['name'] = $request->name;
        $arr['sex'] = $request->sex;
        $arr['phone'] = $request->phone;
        $arr['address'] = $request->address;
        $arr['email'] = $request->email;
        $arr['password'] = $request->password;
        $arr['level'] = $request->level;
        $user::where('id',$id)->update($arr);
        return redirect('admin/user');
    }
    public function getDeleteUser($id){
        User::destroy($id);
        return back();
    }
}
