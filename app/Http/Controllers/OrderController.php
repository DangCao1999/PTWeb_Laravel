<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();

        return View('order.index',['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$ls = DB::table("product_order")->join("products", "products.id", "=", "product_order.pid") ->where("product_order.oid", "=", $ca)

        $order_detail = DB::table('orders')->leftJoin('order_details', "orders.id" ,"=", "order_details.oid")->where("orders.id","=", $id)->get();
        //dd($order_detail);
        //dd($order_detail[0]->user_id);
        $product = DB::table('order_details')->join('products', 'order_details.pid',"=", "products.id")->where("order_details.oid", "=", $id)->get();
        //dd($product);
        $user = DB::table('users')->where('id', "=", $order_detail[0]->user_id)->first();

        //dd($user);

        return view('order.editorder', ['order_detail' => $order_detail, 'user' => $user, 'order_detail' => $order_detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
