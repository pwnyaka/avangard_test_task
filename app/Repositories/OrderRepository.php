<?php


namespace App\Repositories;


use App\Order;
use DB;

class OrderRepository
{
    protected function _mainQuery()
    {
        return Order::query()
            ->join('partners', 'partners.id', '=', 'orders.partner_id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->select('orders.*', 'partners.name', 'order_products.order_id',
                DB::raw('sum(order_products.price * order_products.quantity) as total'));
    }

    public function getAll()
    {
        return $data = $this->_mainQuery()
            ->groupBy('order_products.order_id')
            ->orderBy('id')
            ->paginate(50);
    }

    public function getNew()
    {
        return $data = $this->_mainQuery()
            ->where('delivery_dt', '>', date('Y-m-d H:i:s'))
            ->where('status', 0)
            ->groupBy('order_products.order_id')
            ->orderBy('delivery_dt')
            ->paginate(50);
    }

    public function getFailed()
    {
        return $data = $this->_mainQuery()
            ->where('delivery_dt', '<', date('Y-m-d H:i:s'))
            ->where('status', 10)
            ->groupBy('order_products.order_id')
            ->orderBy('delivery_dt', 'desc')
            ->paginate(50);
    }

    public function getCurrent()
    {
        $dateLast = new \DateTime();
        $dateLast->modify('+1 day');
        return $data = $this->_mainQuery()
            ->whereBetween('delivery_dt', [date('Y-m-d H:i:s'), $dateLast])
            ->where('status', 10)
            ->groupBy('order_products.order_id')
            ->orderBy('delivery_dt')
            ->paginate(50);
    }

    public function getPerformed()
    {
        return $data = $this->_mainQuery()
            ->whereDate('delivery_dt', date('Y-m-d'))
            ->where('status', 20)
            ->groupBy('order_products.order_id')
            ->orderBy('delivery_dt', 'asc')
            ->paginate(50);
    }

    public function getEmails(Order $order)
    {
        return $list = Order::query()
            ->join('partners', 'partners.id', '=', 'orders.partner_id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_products.product_id')
            ->join('vendors', 'vendors.id', '=', 'products.vendor_id')
            ->select('orders.id', 'partners.email as partnerMail', 'vendors.email as vendorMail' )
            ->where('orders.id', $order->id)
            ->get()
            ->toArray();
    }
}