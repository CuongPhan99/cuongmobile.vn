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
        $data['orderlist'] = DB::table('mc_order')
        ->join('mc_orderdetail','mc_order.or_id','=','mc_orderdetail.od_id')
        ->join('mc_products','mc_products.prod_id','=','mc_orderdetail.prod_id')
        ->select('mc_order.*', 'od_quantity', 'prod_name','od_price')
        ->orderBy('or_id','desc')
        ->get();
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
