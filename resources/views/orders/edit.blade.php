@extends ('layouts.main')

@section('title')
    @parent Редактирование заказа
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>Редактирование заказа</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data"
                              action="{{ route('Orders.update', $order) }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="clientEmail">Email клиента</label>
                                <input type="text" name="client_email" id="clientEmail"
                                       class="form-control @if($errors->has('client_email')) is-invalid @endif"
                                       value="{{ old('client_email') ?? $order->client_email }}">
                                @if($errors->has('client_email'))
                                    @foreach($errors->get('client_email') as $error)
                                        <div class="invalid-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="partner">Партнер</label>
                                <select name="partner_id" id="partner"
                                        class="form-control ">

                                    @forelse($partners as $item)
                                        @if(old('partner_id'))
                                            <option @if (old('partner_id') == $item->id) selected
                                                    @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                        @else
                                            <option @if ($order->partner_id == $item->id) selected
                                                    @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @empty
                                        <option value="0" selected>Нет партнеров</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Статус заказа</label>
                                <select name="status" id="status"
                                        class="form-control">

                                    @forelse($statuses as $item)
                                        @if(old('status') || old('status') === '0')
                                            <option @if (old('status') == $item->status) selected
                                                    @endif value="{{ $item->status }}">
                                                @switch($item->status)
                                                    @case(0)Новый @break

                                                    @case(10)Подтвержден @break

                                                    @case(20)Завершен @break

                                                    @default
                                                    -
                                                @endswitch
                                            </option>
                                        @else
                                            <option @if ($order->status == $item->status) selected
                                                    @endif value="{{ $item->status }}">
                                                @switch($item->status)
                                                    @case(0)Новый @break

                                                    @case(10)Подтвержден @break

                                                    @case(20)Завершен @break

                                                    @default
                                                    -
                                                @endswitch
                                            </option>
                                        @endif
                                    @empty
                                        <option value="0" selected>Error</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <ul>
                                    @forelse($composition[0] as $item)
                                        <li>{{ $item->quantity }} шт. {{ $item->name }}</li>
                                    @empty
                                        Error
                                    @endforelse
                                </ul>
                            </div>
                            <div class="form-group">
                                <p>Cумма заказа: {{ $total[0] }}</p>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary"
                                       value="Изменить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
