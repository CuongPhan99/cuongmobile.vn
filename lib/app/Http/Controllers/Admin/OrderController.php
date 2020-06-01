<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use DB;

class OrderController extends Controller
{
    //
    public function getOrder(){
        $data['orderlist'] = DB::select('select * from mc_order');
        $data['chitiet'] = DB::select('select * from mc_orderdetail a, mc_products b where a.prod_id=b.prod_id');
        // dd($data);
        return view('backend.order',$data);
 
    }  
    public function getCheckOrder($id)
    {
        $order = Order::find($id);
        $orderdetail = OrderDetail::where($id);
        if($orderdetail)
        {
            foreach($orderdetail as $order)
            {
               $product = Product::find($id);
               $product->prod_qty = $product->prod_qty - $order->od_quantity;
               $product->save();
            }
        }
        $order->or_status = Order::STATUS_DONE;
        $order->save();
        return redirect('admin/order');
    }
    public function getDeleteOrder($id){
        Order::destroy($id);
        return back();
    }
}
