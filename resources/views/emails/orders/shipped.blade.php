{{--TODO--}}
<p> Заказ № {{ $order->id }} завершен.</p>
<ul>
    @forelse($ordersComposition[$order->id] as $item)
        <li>{{ $item->quantity }} шт. {{ $item->name }} </li>
    @empty
        Error
    @endforelse
</ul>

<p>Сумма заказа {{ $total }}</p>