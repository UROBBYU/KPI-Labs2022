<h1>Адмінка</h1>
<div class="leftnav" style="float: left; width: 150px; height: 100%; margin-right: 30px">
    <b>Групи</b>
    <ul>
        <li><a href="/laravel/admin/groups">список</a></li>
        <li><a href="/laravel/admin/groups/create">додати</a></li>
    </ul>
    <br/>
    <b>Кабінет</b>
    <ul>
        <li><a href="/laravel/logout">Logout</a></li>
    </ul>
    <ul>
        <li><a href="/laravel/groups">Frontend</a></li>
    </ul>
</div>
<div>
    @yield('content')
</div>
@include('layouts.footer')