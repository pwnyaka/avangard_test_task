<?php


namespace App\Repositories;


use DB;

class OrderProductsRepository
{
    public function getAll() {
        return $data = DB::table('order_products')
            ->join('products', 'products.id', '=', 'order_products.product_id')
            ->select('order_products.order_id', 'order_products.quantity', 'products.name')
            ->orderBy('order_id')
            ->get()
            ->groupBy('order_id')
            ->toArray();
    }
}