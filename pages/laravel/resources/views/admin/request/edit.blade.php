@extends('admin.layout')

@section('content')
    @php
        $datetime = explode(' ', $request->datetime);
        $date = $datetime[0];
        $time = explode('.', $datetime[1])[0];
    @endphp
    <form class="create" action="/laravel/admin/requests/{{$request->id}}" method="POST">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div>Метод:</div>
        <select name="method" required>
            @foreach ($methods as $method)
                <option value="{{$method->name}}" {{$request->method == $method->name ? 'selected' : ''}}>{{$method->name}}</option>
            @endforeach
        </select>
        <div>URL:</div>
        <input name="url" type="text" pattern="https?:\/\/[a-z\.]+?(\/.*)?" value="{{$request->scheme . '://' . $request->domain . $request->path . ($request->query ? '?' . $request->query : '')}}" required>
        <div>Тип MIME:</div>
        <select name="content_type" required>
            @foreach ($types as $type)
                <option value="{{$type->name}}" {{$request->method == $type->name ? 'selected' : ''}}>{{$type->name}}</option>
            @endforeach
        </select>
        <div>Тіло запиту:</div>
        <textarea name="body" cols="30" rows="3">{{$request->body ?: ''}}</textarea>
        <div>Трафік:</div>
        <input name="content_length" type="number" value="{{$request->content_length}}" required>
        <div>IP:</div>
        <input name="referrer" type="text" required pattern="\d\d?\d?\.\d\d?\d?\.\d\d?\d?\.\d\d?\d?" value="{{$request->referrer}}">
        <div>Країна:</div>
        <input name="country" type="text" pattern="[A-Z]{2}" value="{{$request->country}}" required>
        <div>Дата та час:</div>
        <input name="date" type="date" value="{{$date}}" required>
        &times;
        <input name="time" type="time" value="{{$time}}" required><br><br>
        <button>Зберегти</button>
    </form>
@endsection