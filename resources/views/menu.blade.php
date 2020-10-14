<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('Home')?'active':'' }}" href="{{ route('Home') }}">Главная</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('News')?'active':'' }}" href="{{ route('News') }}">Все новости</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('Category')?'active':'' }}" href="{{ route('Category') }}">Категории новостей</a></li>
{{--    @if(Auth::user() !== null && Auth::user()->is_admin)<li class="nav-item">--}}
{{--        <div class="dropdown">--}}
{{--            <a class="nav-link dropdown-toggle {{ request()->routeIs('Admin.news.index')?'active':'' }}" href="{{ route('Admin.news.index') }}">Админка</a>--}}
{{--            <div class="dropdown-menu">--}}
{{--                <a class="dropdown-item" href="{{ route('Admin.news.index') }}">Управление новостями</a>--}}
{{--                <a class="dropdown-item" href="{{ route('Admin.categories.index') }}">Управление категориями</a>--}}
{{--                <a class="dropdown-item" href="{{ route('Admin.users.index') }}">Управление пользователями</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        </li>@endif--}}
</ul>





