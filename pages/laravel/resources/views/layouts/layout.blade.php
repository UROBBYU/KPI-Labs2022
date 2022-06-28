<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Інформаційна система Google Analytics</title>
    <style>
        :root {
            scrollbar-width: thin;
        }
        body {
            font-family: sans-serif;
            background-color: #0d1117;
            color: #e0e0e0;
        }
        td, th {
            padding-block: 8px;
        }
        td[title] {
            font-style: italic;
            color: darkslategray;
            user-select: none;
            cursor: pointer;
        }
        td[title]:not([title='NULL']) {
            font-style: normal;
            color: darkorange;
        }
        b {
            font-size: 1.5em;
        }
        form {
            font-size: 1.3em;
        }
        button {
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
        button:hover {
            background-color: #262a2f;
            border-color: aquamarine;
        }
        table {
            font-size: 1.2em;
            padding: 5px;
            margin-top: 8px;
            background-color: #181c23;
            border-radius: 5px;
            border: solid 1px #30363d;
            border-spacing: 0;
        }
        tr:nth-child(2n + 1) {
            background-color: #1f242d;
        }
        .center {
            text-align: center;
        }
        .right {
            text-align: right;
        }
        input[type=range] {
            transform: translate(0, 7px);
        }
    </style>
</head>
<body>
    @yield('title')
    @yield('content')
    @include('layouts.footer')
</body>
</html>