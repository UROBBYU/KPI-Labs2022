@extends('admin.layout')

@section('form')
    <form class="search">
        <input name="search" type="text" size="40" value="{{$search ?: ''}}">
        <input name="size" value="{{$page_size}}" hidden>
        <button>Пошук</button>
    </form>
@endsection

@section('controls')
    <form class="controls">
        <button hidden></button>
        <input name="search" value="{{$search}}" hidden>
        @if ($page > 0)
            <button formaction="/laravel/admin/requests/{{$page - 1}}"><</button>
        @endif
        @for ($i = max($page - 3, 0); $i < $page; $i++)
            <button formaction="/laravel/admin/requests/{{$i}}">{{$i}}</button>
        @endfor
        <input id="page" type="number" size="2" value="{{$page}}">
        @for ($i = $page + 1; $i <= min($page_max, $page + 3); $i++)
            <button formaction="/laravel/admin/requests/{{$i}}">{{$i}}</button>
        @endfor
        @if ($page < $page_max)
            <button formaction="/laravel/admin/requests/{{$page + 1}}">></button>
        @endif
        <span>Розмір:</span>
        <input name="size" id="page-size" type="number" size="1" value="{{$page_size}}">
    </form>
    <script>
        document.querySelector('.controls:last-of-type > input[type=number]')
        .addEventListener('keydown', e => {
            if (e.code == 'Enter') {
                e.preventDefault()
                location.pathname = '/laravel/admin/requests/' + e.target.value
            }
        })
    </script>
@endsection

@section('content')
    @once
    @php
        function step(&$val, &$type) {
            if ($val / 1024 >= 1) {
                $val = $val / 1024;
                array_shift($type);

                return step($val, $type);
            }

            return round($val, 2) . ' ' . $type[0];
        }
    @endphp
    @endonce
    <table class="list">
        <tr>
            <th></th>
            <th></th>
            <th>ID</th>
            <th>Метод</th>
            <th>Схема</th>
            <th>Домен</th>
            <th>Шлях</th>
            <th>Параметри</th>
            <th>Тип MIME</th>
            <th>Тіло</th>
            <th>Трафік</th>
            <th>IP користувача</th>
            <th>Країна</th>
            <th>Дата</th>
        </tr>
        @foreach ($table as $row)
            @php
                $traffic = $row->content_length;
                $traffic_type = array('Б', 'КБ', 'МБ', 'ГБ', 'ТБ');

                $traffic = step($traffic, $traffic_type);
            @endphp
            <tr>
                <td>
                    <form action="/laravel/admin/requests/{{$row->id}}" target="_blank" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <input name="page" value="{{$page}}" hidden>
                        <input name="search" value="{{$search}}" hidden>
                        <input name="size" value="{{$page_size}}" hidden>
                        <button>❌</button>
                    </form>
                </td>
                <td>
                    <button onclick="location.assign('/laravel/admin/requests/{{$row->id}}/edit')">✏️</button>
                </td>
                <td>{{$row->id}}</td>
                <td class="center">{{$row->method}}</td>
                <td class="center">{{$row->scheme}}</td>
                <td>{{$row->domain}}</td>
                <td>{{$row->path}}</td>
                <td>{{$row->query}}</td>
                <td>{{$row->content_type}}</td>
                <td class="center" title="{{$row->body ?: 'NULL'}}">{{$row->body ? '[data]' : 'NULL'}}</td>
                <td class="right">{{$traffic}}</td>
                <td class="center">{{$row->referrer}}</td>
                <td class="center">{{$row->country}}</td>
                <td>{{explode('.', $row->datetime)[0]}}</td>
            </tr>
        @endforeach
    </table>
@endsection