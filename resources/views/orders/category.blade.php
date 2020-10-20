@extends ('layouts.main')

@section('title')
    @parent {{ $text }}
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
                            <h2>{{ $text }}</h2>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Партнер</th>
                                <th scope="col">Стоимость заказа</th>
                                <th scope="col">Дата доставки</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <th scope="row"><a href="{{ route('Orders.edit', $order) }}" target="_blank">{{ $order->id }}</a></th>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->delivery_dt }}</td>
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