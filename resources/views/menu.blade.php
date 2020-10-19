<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('Home')?'active':'' }}" href="{{ route('Home') }}">Главная</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('Weather')?'active':'' }}" href="{{ route('Weather') }}">Погода в Брянске</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('Orders.index')?'active':'' }}" href="{{ route('Orders.index') }}">Таблица заказов</a></li>
</ul>





