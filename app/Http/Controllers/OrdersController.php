<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
            ->join('partners', 'partners.id', '=', 'orders.partner_id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->select('orders.*', 'partners.name', 'order_products.order_id',
                DB::raw('sum(order_products.price * order_products.quantity) as total'))
            ->groupBy('order_products.order_id')
            ->orderBy('id')
            ->get();

        $ordersComposition = DB::table('order_products')
            ->join('products', 'products.id', '=', 'order_products.product_id')
            ->select('order_products.order_id','order_products.quantity', 'products.name')
            ->orderBy('order_id')
            ->get()
            ->groupBy('order_id')
            ->toArray();

        return view('orders.index')->with('orders', $orders)->with('ordersComposition', $ordersComposition);
    }
}
