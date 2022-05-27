@extends('admin.layout')

<style type="text/css">
    label {
        min-width: 150px;
        display: inline-block;
    }
</style>

@section('content')
    <h2>Редагування групу</h2>
    <form action="/laravel/admin/groups/{{$group->group_id}}" method="POST">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <label>Шифр групи</label>
        <input type="text" name="title" value="{{$group->title}}">
        <br/>
        <br/>
        <label>Форма навчання</label>
        <select name="state">
            <option value="Бюджет" {{($group->state == 'Бюджет') ? 'selected' : ''}}>Бюджет</option>
            <option value="Контракт" {{($group->state == 'Контракт') ? 'selected' : ''}}>Контракт</option>
        </select>
        <br/>
        <br/>
        <input type="submit" value="Зберегти">
    </form>
@endsection