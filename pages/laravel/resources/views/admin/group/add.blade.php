@extends('admin.layout')

<style type="text/css">
    label {
        min-width: 150px;
        display: inline-block;
    }
</style>

@section('content')
    <h2>Додати групу</h2>
    <form action="/laravel/admin/groups" method="POST">
        {{csrf_field()}}
        <label>Шифр групи </label>
        <input type="text" name="title">
        <br/>
        <br/>
        <label>Форма навчання</label>
        <select name="state">
            <option value="Бюджет">Бюджет</option>
            <option value="Контракт">Контракт</option>
        </select>
        <br/>
        <br/>
        <input type="submit" value="Зберегти">
    </form>
@endsection