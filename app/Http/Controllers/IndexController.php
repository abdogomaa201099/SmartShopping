<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('log')->only('index');
        // $this->middleware('subscribed')->except('store');
    }
    public function index()
    {
        $Products=Product::get();
        return view('index',['products'=>$Products]);
    }

    public function addtocart(Request $request)
    {
        $prod_id=$request->id;
        $user_id=Auth::id();
        if (cart::where([['product_id','=', $prod_id], ['order_id','=', Null]])->exists() ) {
            $crt=cart::where([['user_id','=',$user_id],['product_id','=', $prod_id]])->first();
            DB::table('carts')
            ->where([['user_id','=',$user_id],['product_id', $prod_id]])
            ->update(['qty' => ($crt->qty+1)]);
        }else{
            cart::create(
                [
                    'product_id' => $prod_id,
                    'user_id'=> $user_id,
                    'qty'=> 1,
                ]
            );
        }
        

        return redirect('/');
    }

    public function showcart()
    {
        $user_id=Auth::id();
        $results = cart::with('product')->where([['user_id','=',$user_id],['order_id','=',Null]])->get();
        return view('cart',['cart_products'=>$results]);
    }



    public function removefromcart(Request $request)
    {
        $user_id=Auth::id();
        $cprod_id=$request->id;
        $cp=cart::where([['user_id','=',$user_id],['id','=', $cprod_id]])->delete();
        return redirect('/cart');
    }

    public function placeorder(Request $request)
    {
        $tot_pr=$request->tot_price;
        $user_id=Auth::id();
        $nord=order::create(
            [
                'total_price' =>$tot_pr,
                'user_id'=> $user_id,
            ]
        );
        $cartp=cart::where([
            ['user_id','=', $user_id], ['order_id','=',Null]
            ])->get();

        foreach($cartp as $cp){
                DB::table('carts')
                ->where([['user_id','=', $user_id], ['order_id','=',Null]])
                ->update(['order_id' => $nord->id]);
            
        }
        
        return redirect('/cart');
    }

    public function showorders()
    {
        $user_id=Auth::id();
        $orders=order::with('carts')->get();
        $orders= $orders->where('user_id','=', $user_id);
        return view('orders',['orders'=>$orders]);
    }
    
    public function showorderdetails(Request $request)
    {
        $order_id=$request->order_id;
        $user_id=Auth::id();
        $orders=order::with('carts')->get();
        $orders=$orders->where('id','=', $order_id)->first();
        $order=$orders->where('user_id','=',$user_id)->first();
        
        return view('showorder',['order'=>$order]);
    }

    public function cancelitem(Request $request)
    {
        $user_id=Auth::id();
        $cprod_id=$request->prod_id;
        $cartptod=cart::where([['user_id','=',$user_id],['id','=', $cprod_id]])->first();
        $order=order::where([['user_id','=',$user_id],['id','=', $cartptod->order_id]])->first();
        DB::table('carts')
            ->where('id', $cprod_id)
            ->delete();
        if(cart::where('order_id','=',$order->id)->exists()){
            return view('showorder',['order'=>$order]);
        }else{
            order::where([['user_id','=', $user_id ] , [ 'id','=',$order->id]])->delete();
            $orders=order::where('user_id','=',$user_id)->get();
            return view('orders',['orders'=>$orders]);
        }
            
    }

}
