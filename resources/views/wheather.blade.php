@extends ('layouts.main')

@section('title')
    @parent Погода
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    @php {{ date_default_timezone_set($data['data']->info->tzinfo->name); }} @endphp

    <div class="container">
        <div class="page-header">
            <h2>Погода в Брянске</h2>
            <img src="https://yastatic.net/weather/i/icons/blueye/color/svg/{{ $data['data']->fact->icon }}.svg" alt="" style="width: 50px">
            {{ date('h:i A') }}
            <ul>
                <li>{{ $data['dictionary']['condition']->text }}</li>
                <li>Температура {{ $data['data']->fact->temp }}  &deg;C</li>
                <li>Ощущается как {{ $data['data']->fact->feels_like }}  &deg;C</li>
                <li>Ветер {{ $data['data']->fact->wind_speed }} м/с. {{ $data['dictionary']['wind_dir']->text }} направление. </li>
                <li>Влажность воздуха {{ $data['data']->fact->humidity }} %</li>
                <li>Атм. давление {{ $data['data']->fact->pressure_mm }} мм.рт.ст</li>
            </ul>
        </div>
    </div>

@endsection
