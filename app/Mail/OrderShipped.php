<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
    protected $total;
    protected $orderComposition;


    public function __construct(Order $order, $total, $orderComposition)
    {
        $this->order = $order;
        $this->total = $order;
        $this->orderComposition = $orderComposition;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orders.shipped')
            ->with([
                'order' => $this->order,
                'total' => $this->total,
                'orderComposition' => $this->orderComposition,
            ]);
    }
}