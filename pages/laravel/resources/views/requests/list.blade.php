@extends('layouts.layout')

@section('title')
    <b>Список запитів</b>
    <button onclick="location.assign('/laravel/requests/extended')">Розширена версія</button>
    <button onclick="location.assign('/laravel/admin/requests')">Адмін панель</button>
    <form style="margin-top: 12px">
        К-сть місяців: <input min="1" max="6" value="{{$months}}" type="range" name="months" list="months">
        <button>Фільтр</button>
    </form>
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
    <table width="600">
        <tr>
            <th>Домен</th>
            <th>К-сть</th>
            <th>Трафік</th>
        </tr>
        @foreach ($requests as $req)
            @php
                $traffic = $req->traffic;
                $traffic_type = array('Б', 'КБ', 'МБ', 'ГБ', 'ТБ');

                $traffic = step($traffic, $traffic_type);
            @endphp
            <tr>
                <td>{{$req->domain}}</td>
                <td class="center">{{$req->requests}}</td>
                <td class="right">{{$traffic}}</td>
            </tr>
        @endforeach
    </table>
@endsection