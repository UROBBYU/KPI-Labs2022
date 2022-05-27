@extends("layouts.layout")

@section("title")
    <b>Список груп</b>
@endsection

@section("content")
    <form method="get" action="/laravel/groups">
        <select name="state">
            <option value="" disabled {{!$state ? 'selected' : ''}}>Всі категорії</option>
            <option value="Бюджет" {{$state == 'Бюджет' ? 'selected' : ''}}>Бюджет</option>
            <option value="Контракт" {{$state == 'Контракт' ? 'selected' : ''}}>Контракт</option>
        </select>
        <input type="submit" value="Знайти"/>
    </form>
    <table>
        <tr>
            <th>Шифр групи</th>
            <th>Форма навчання</th>
        </tr>
        @foreach ($groups as $group)
            <tr>
                <td>
                    <a href="/laravel/group/{{$group->group_id}}">{{$group->title}}</a>
                </td>
                <td>{{$group->state}}</td>
            </tr>
        @endforeach
    </table>
@endsection