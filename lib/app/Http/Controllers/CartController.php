<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail,Session;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Collection;
use Auth;
class CartController extends Controller
{
    
    public function getAddCart($id){
        $product = Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'weight' => 550, 'options' => ['img' => $product->prod_img]]);
        return redirect('cart/show');       
    }
    public function getShowCart(){
        $data['total']= Cart::total();
        $data['items'] = Cart::content();
        return view('frontend.cart',$data);
    }
    public function getDeleteCart($id){
        if($id=='all'){
            Cart::destroy();
        }else{
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
    }
    public function postComplete(Request $request){
 
         $data['info'] = $request->all();
        //  $email = $request->email;
         $data['cart'] = Cart::content();
         $data['total'] = Cart::total();

         $order = new Order;
         $order->id = Auth::user()->id;
         $order->or_name = $request->name;
         $order->or_phone = $request->phone;
         $order->or_address = $request->add;
         $order->or_pttt = $request->pttt;
         $order->or_status = 0 ;
         $order->save();
         
         $od_id = $order->or_id;
         if(Cart::count()>=1)
         {
             foreach ($data['cart'] as $item) {     
                 $orderdetail = new OrderDetail;         
                 $orderdetail->od_id = $od_id;
                 $orderdetail->prod_id = $item->id;
                 $orderdetail->od_quantity = $item->qty;
                 $orderdetail->od_price = $item->price*$item->qty;
                 $orderdetail->save();
             }
           
         }
        //  Mail::send('frontend.email', $data, function ($message) use ($email) {
        //      $message->from('cuonghophan99@gmail.com', 'Manh Cuong');       
        //      $message->to($email, $email);
        //      //$message->cc('cuonghophan99@gmail.com', 'Mạnh Cường');           
        //      $message->subject('Xác nhận hóa đơn mua hàng CuongMobile Shop');
        //  });
         Cart::destroy();
         return redirect('complete');
    }
public function getComplete(){
        return view('frontend.complete');

    }
}
