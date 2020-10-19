<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Order extends Model
{
    protected $fillable = ['client_email', 'partner_id', 'status'];

    public static function rules(Order $order)
    {
        return [
            'client_email' => [
                'required',
                'email',
                Rule::unique('orders')->ignore($order->id)
                ]

        ];
    }
}
