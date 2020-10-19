<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_email', 'partner_id', 'status'];

    public static function rules()
    {
        return [
            'client_email' => 'required|email|unique:orders,client_email'
        ];
    }
}
