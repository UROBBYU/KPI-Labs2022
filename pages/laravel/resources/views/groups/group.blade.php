@extends('layouts.layout')

@section('title')
    <b>Інформація про групу {{$group->title}}</b>
@endsection

@section('content')
    <p>Шифр - {{$group->title}}</p>
    <p>Форма навчання - {{$group->state}}</p>

    <a href="/laravel/groups">Дивитися всі групи</a>
@endsection