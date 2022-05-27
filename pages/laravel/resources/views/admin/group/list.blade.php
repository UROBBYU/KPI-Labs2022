@extends('admin.layout')

@section('content')
    <h2>Список груп</h2>
    <table style="text-align: center; border: 1px">
        <th>Шифр групи</th>
        <th>Курс</th>
        <th>Форма навчання</th>
        <th>Дія</th>
        @foreach ($groups as $group)
            <tr>
                <td>
                    <a href="/laravel/group/{{$group->group_id}}">{{$group->title}}</a>
                </td>
                <td>{{$group->state}}</td>
                <td>
                    <a href="/laravel/admin/groups/{{$group->group_id}}/edit">edit</a>
                    <form style="float:right; padding: 0 15px" action="/laravel/admin/groups/{{$group->group_id}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection