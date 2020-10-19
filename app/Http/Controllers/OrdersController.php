<?php

namespace App\Http\Controllers;

use App\Order;
use App\Partner;
use Illuminate\Http\Request;
use DB;

class OrdersController extends Controller
{
    public function index()
    {
        session()->forget(['orders_composition', 'orders_total']);
//        session()->flush();
        $orders = Order::query()
            ->join('partners', 'partners.id', '=', 'orders.partner_id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->select('orders.*', 'partners.name', 'order_products.order_id',
                DB::raw('sum(order_products.price * order_products.quantity) as total'))
            ->groupBy('order_products.order_id')
            ->orderBy('id')
            ->get();

        foreach ($orders as $order) {
            session()->push('orders_total.' . $order->id, $order->total);
        }

        $ordersComposition = DB::table('order_products')
            ->join('products', 'products.id', '=', 'order_products.product_id')
            ->select('order_products.order_id', 'order_products.quantity', 'products.name')
            ->orderBy('order_id')
            ->get()
            ->groupBy('order_id')
            ->toArray();
        foreach ($ordersComposition as $key => $item) {
            session()->push('orders_composition.' . $key, $item);
        }

        return view('orders.index')->with('orders', $orders)->with('ordersComposition', $ordersComposition);
    }

    public function edit($id)
    {
        $order = Order::query()->find($id);

        return view('orders.edit', [
            'order' => $order,
            'partners' => Partner::query()->orderBy('name')->get(),
            'statuses' => Order::query()->select('status')->distinct()->get(),
            'total' => session('orders_total.' . $id),
            'composition' => session('orders_composition.' . $id)
        ]);
    }

    public function update(Order $order, Request $request) {
        $data = $request->except('_token');
        $this->validate($request, Order::rules());
        $order->fill($data)->save();

        return redirect()->route('Orders.index')->with('success', 'Данные заказа успешно изменены!');
    }
}
