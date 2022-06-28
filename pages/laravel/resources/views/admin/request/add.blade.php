@extends('admin.layout')

@section('content')
    <form class="create" action="/laravel/admin/requests" method="POST">
        {{csrf_field()}}
        <div>Метод:</div>
        <select name="method" required>
            @foreach ($methods as $method)
                <option value="{{$method->name}}">{{$method->name}}</option>
            @endforeach
        </select>
        <div>URL:</div>
        <input name="url" type="text" pattern="https?:\/\/[a-z\.]+?(\/.*)?" required>
        <div>Тип MIME:</div>
        <select name="content_type" required>
            @foreach ($types as $type)
                <option value="{{$type->name}}">{{$type->name}}</option>
            @endforeach
        </select>
        <div>Тіло запиту:</div>
        <textarea name="body" cols="30" rows="3"></textarea>
        <div>Трафік:</div>
        <input name="content_length" type="number" size="6" value="0" required>
        <div>IP:</div>
        <input name="referrer" type="text" size="13" required pattern="\d\d?\d?\.\d\d?\d?\.\d\d?\d?\.\d\d?\d?" value="{{$ip}}">
        <div>Країна:</div>
        <input name="country" type="text" size="1" pattern="[A-Z]{2}" required>
        <div>Дата та час:</div>
        <input name="date" type="date" required>
        &times;
        <input name="time" type="time" step="1" required><br><br>
        <button>Додати</button>
    </form>
@endsection