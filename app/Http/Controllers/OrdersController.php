<?php

namespace App\Http\Controllers;

use App\Order;
use App\Partner;
use App\Repositories\OrderProductsRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(OrderRepository $orderRepository, OrderProductsRepository $orderProductsRepository)
    {
        session()->forget(['orders_composition', 'orders_total']);
        $orders = $orderRepository->getAll();
//        dd($orders);

        foreach ($orders as $order) {
            session()->push('orders_total.' . $order->id, $order->total);
        }

        $ordersComposition = $orderProductsRepository->getAll();

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

    public function update(Order $order, Request $request)
    {

        $data = $request->except('_token');
        $this->validate($request, Order::rules($order));

        if ($order->status != 20 && $data['status'] == 20) {
            dd('GO!');
        }

        $order->fill($data)->save();

        return redirect()->route('Orders.index')->with('success', 'Данные заказа успешно изменены!');
    }

    public function newOrders(OrderRepository $orderRepository)
    {
        $orders = $orderRepository->getNew();

        return view('orders.category')->with('orders', $orders)->with('text', 'Новые заказы');
    }

    public function failOrders(OrderRepository $orderRepository)
    {
        $orders = $orderRepository->getFailed();

        return view('orders.category')->with('orders', $orders)->with('text', 'Просроченные заказы');
    }

    public function currentOrders(OrderRepository $orderRepository)
    {
        $orders = $orderRepository->getCurrent();

        return view('orders.category')->with('orders', $orders)->with('text', 'Текущие заказы');
    }

    public function performedOrders(OrderRepository $orderRepository)
    {
        $orders = $orderRepository->getPerformed();

        return view('orders.category')->with('orders', $orders)->with('text', 'Выполненные заказы');
    }
}
