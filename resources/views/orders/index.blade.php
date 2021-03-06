@extends ('layouts.main')

@section('title')
    @parent Заказы
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-header">
                            <h2>Заказы</h2>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Партнер</th>
                                <th scope="col">Стоимость заказа</th>
                                <th scope="col">Состав заказа</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <th scope="row"><a href="{{ route('Orders.edit', $order) }}" target="_blank">{{ $order->id }}</a>
                                    </th>
                                    <td>@switch($order->status)
                                            @case(0)
                                            Новый
                                            @break

                                            @case(10)
                                            Подтвержден
                                            @break

                                            @case(20)
                                            Завершен
                                            @break

                                            @default
                                            -
                                        @endswitch</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        <ul>
                                            @forelse($ordersComposition[$order->id] as $item)
                                                <li>{{ $item->quantity }} шт. {{ $item->name }} </li>
                                            @empty
                                                Error
                                            @endforelse
                                        </ul>
                                    </td>
                                </tr>
                            @empty
                                Error
                            @endforelse
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
