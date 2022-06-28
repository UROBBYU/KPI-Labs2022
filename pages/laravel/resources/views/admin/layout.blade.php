<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Адмінка</title>
    <style>
        :root {
            scrollbar-width: thin;
        }
        body {
            font-family: sans-serif;
            background-color: #0d1117;
            color: #e0e0e0;
        }

        /* MENU */

        .menu {
            z-index: 2;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            display: flex;
            font-weight: bold;
            justify-content: right;
            user-select: none;
            background-color: #30363d
        }
        .menu > .spacer {
            margin-right: auto;
        }
        .menu > div {
            line-height: 2em;
            font-size: 1.8em;
            font-weight: bold;
            padding-inline: 0.6em;
            width: max-content;
            user-select: none;
            color: aliceblue;
        }
        .menu > a {
            position: relative;
            flex-basis: content;
            margin-left: -1px;
            padding-inline: 1em;
            line-height: 2em;
            text-align: center;
            text-decoration: none;
            font-size: 1.8em;
            color: beige;
            background-color: var(--bg);
            transition: filter 0.2s;
        }
        .menu > a::before {
            content: '';
            display: inline-block;
            position: absolute;
            top: 0;
            left: -0.5em;
            width: 0;
            height: 0;
            box-shadow: 3px 0 0 0 var(--bg);
            border-right: solid 0.5em var(--bg);
            border-block: solid 1em transparent;
        }
        .menu > a:hover {
            filter: brightness(0.8);
        }
        .menu span {
            display: block;
        }

        /* CONTENT */

        .content {
            padding-top: 4em;
        }

        /* LIST */

        .list td, th {
            padding: 8px 5px;
        }
        .list td[title] {
            font-style: italic;
            color: darkslategray;
            user-select: none;
            cursor: pointer;
        }
        .list td[title]:not([title='NULL']) {
            font-style: normal;
            color: darkorange;
        }
        .list {
            min-width: 1700px;
            font-size: 1.2em;
            padding: 5px;
            margin-top: 8px;
            background-color: #181c23;
            border-radius: 5px;
            border: solid 1px #30363d;
            border-spacing: 0;
        }
        .list tr:nth-child(2n + 1) {
            background-color: #1f242d;
        }
        .list button {
            cursor: pointer;
            padding-block: .3em;
            background-color: transparent;
            border: solid 1px transparent;
            border-radius: .5em;
            transition: background-color .2s, border-color .2s;
        }
        .list button:hover {
            background-color: #262a2f;
            border-color: aquamarine;
        }
        .list .center {
            text-align: center;
        }
        .list .right {
            text-align: right;
        }

        /* SEARCH */

        .search form {
            font-size: 1.3em;
        }
        .search button {
            font-size: 1.2rem;
            padding: 1px 7px 2px;
            margin-left: 10px;
            background-color: #181c23;
            color: #e0e0e0;
            cursor: pointer;
            border-radius: 8px;
            border: solid 1px #30363d;
            transition: background-color .2s, border-color .2s;
        }
        .search button:hover {
            background-color: #262a2f;
            border-color: aquamarine;
        }
        .search input[type="text"] {
            font-size: 1.1em;
            color: aliceblue;
            background-color: #1f242d;
            border: solid 1px #30363d;
            border-radius: .3em;
            padding: .2em .6em;
            transition: background-color .2s, border-color .2s;
        }
        .search input[type="text"]:focus-visible {
            outline: none;
            background-color: #262a2f;
            border-color: aquamarine;
        }

        /* CONTROLS */

        .controls {
            user-select: none;
            margin-block: 12px 8px;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
        .controls input {
            text-align: center;
            font-size: 1.1em;
            color: aliceblue;
            background-color: #1f242d;
            border: solid 1px #30363d;
            border-radius: .3em;
            padding: .2em .6em;
            transition: background-color .2s, border-color .2s;
        }
        .controls input:focus-visible {
            outline: none;
            background-color: #262a2f;
            border-color: aquamarine;
        }
        .controls button {
            background-color: #181c23;
            color: #e0e0e0;
            cursor: pointer;
            border-radius: 8px;
            border: solid 1px #30363d;
            transition: background-color .2s, border-color .2s;
        }
        .controls button:hover {
            background-color: #262a2f;
            border-color: aquamarine;
        }
        .controls span {
            margin-left: 20px;
        }

        /* CREATE */

        .create {
            width: max-content;
            padding: 20px 40px;
            background-color: #1f242d;
            border-radius: 20px;
            border: solid 1px #30363d;
        }
        .create :is(input, select, textarea) {
            font-size: 1.1em;
            color: aliceblue;
            background-color: #0d1117;
            border: solid 1px #30363d;
            border-radius: .3em;
            padding: .2em .6em;
            transition: background-color .2s, border-color .2s;
        }
        .create :is(input, select, textarea):focus-visible {
            outline: none;
            background-color: #262a2f;
            border-color: aquamarine;
        }
        .create button {
            font-size: 1.1em;
            padding-inline: .6em;
            background-color: #0d1117;
            color: #e0e0e0;
            cursor: pointer;
            border-radius: .8em;
            border: solid 1px #30363d;
            transition: background-color .2s, border-color .2s;
            padding-block: .2em .4em;
        }
        .create button:hover {
            background-color: #262a2f;
            border-color: aquamarine;
        }
        .create div {
            margin-block: .6em .3em;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="menu">
        <div>Адміністратор</div>
        <div class="spacer"></div>
        <a style="--bg: darkcyan" href="/laravel/admin/requests/0?search=&size=50"><span>Список</span></a>
        <a style="--bg: darksalmon" href="/laravel/admin/requests/create"><span>Додати</span></a>
        <a style="--bg: darkslategrey" href="/laravel/requests"><span>Вийти</span></a>
    </div>
    <div class="content">
        @yield('form')
        @yield('controls')
        @yield('content')
        @yield('controls')
    </div>
    @include('layouts.footer')
</body>
</html>