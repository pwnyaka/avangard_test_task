<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use DB;

class OrdersController extends Controller
{
    public function index() {
//        $orders = Order::all();
        $orders = DB::table('orders')
            ->join('partners', 'partners.id', '=', 'orders.partner_id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'partners.name', 'order_products.order_id',
//                DB::raw('group_concat(order_products.product_id) as composition'),
                DB::raw('sum(order_products.price * order_products.quantity) as total'))
//            ->select('orders.*', 'partners.name', 'order_products.product_id', 'order_products.quantity', 'order_products.price')
            ->groupBy('order_products.order_id')
            ->orderBy('id')
            ->limit(10)
            ->get();
//        dd($orders);
        return view('orders.index')->with('orders', $orders);
    }
}
