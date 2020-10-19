<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('Home')?'active':'' }}" href="{{ route('Home') }}">Главная</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('Weather')?'active':'' }}" href="{{ route('Weather') }}">Погода в Брянске</a></li>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('Orders.index')?'active':'' }}" href="{{ route('Orders.index') }}">Таблица заказов</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('Orders.fail_orders') }}">Просроченные заказы</a>
                <a class="dropdown-item" href="{{ route('Orders.current_orders') }}">Текущие заказы</a>
                <a class="dropdown-item" href="{{ route('Orders.new_orders') }}">Новые заказы</a>
                <a class="dropdown-item" href="{{ route('Orders.performed_orders') }}">Выполненные заказы</a>
            </div>
        </div>
    </li>
</ul>





