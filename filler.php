<?php
    $req = new PDO('sqlsrv:Server=localhost,1433;Database=Analytics', 'testname', 'testpass');
    $req->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $ip = implode('.', array(rand(8, 255), rand(8, 255), rand(8, 255), rand(8, 255)));
    $locale = array('UA', 'US', 'AU', 'RU', 'GB', 'FR', 'BR', 'GR');
    $time = date('Y-m-d H:i:s', mktime(rand(0, 23), rand(0, 59), rand(0, 59), rand(1, 6), rand(1, 26), 2022));

    shuffle($locale);

    $template1 = array(
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/favicon.ico', '', 'GET', NULL, 'image/vnd.microsoft.icon', 15086, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/space-demo/js/main.js', '', 'GET', NULL, 'application/javascript', 3429, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/space-demo/js/controls.js', '', 'GET', NULL, 'application/javascript', 1186, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/space-demo/js/engine.js', '', 'GET', NULL, 'application/javascript', 9406, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/space-demo/assets/img/ship.png', '', 'GET', NULL, 'image/png', 4395, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/space-demo/assets/img/space.jpg', '', 'GET', NULL, 'image/jpeg', 209413, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')"
    );
    $template2 = array(
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/bookreader/style.css', '', 'GET', NULL, 'text/css', 7610, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/bookreader/main.js', '', 'GET', NULL, 'application/javascript', 11658, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/bookreader/catalog.js', '', 'GET', NULL, 'application/javascript', 2652, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/bookreader/title.js', '', 'GET', NULL, 'application/javascript', 1961, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/bookreader/book.js', '', 'GET', NULL, 'application/javascript', 3058, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/bookreader/custom-icons.woff', '', 'GET', NULL, 'font/woff', 17124, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/img/apple-touch-icon.png', 'v=3', 'GET', NULL, 'image/png', 1218, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/favicon.ico', 'v=3', 'GET', NULL, 'image/vnd.microsoft.icon', 15086, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'server.urepo.com.ua:8443', '/userauth/check/', '', 'GET', NULL, 'text/html', 6, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'server.urepo.com.ua:8443', '/user/messages/', '', 'GET', NULL, 'application/json', 213, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'server.urepo.com.ua:8443', '/books/', '', 'GET', NULL, 'application/json', 3574, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'server.urepo.com.ua:8443', '/user/bookmarks/', '', 'GET', NULL, 'application/json', 91, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'server.urepo.com.ua:8443', '/user/profile/l33t/', '', 'GET', NULL, 'application/json', 150, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'server.urepo.com.ua:8443', '/userauth/check/', '', 'GET', NULL, 'text/html', 6, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'server.urepo.com.ua:8443', '/books/', '', 'GET', NULL, 'application/json', 3574, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'server.urepo.com.ua:8443', '/books/1/', '', 'OPTIONS', NULL, 'text/plain', 0, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'server.urepo.com.ua:8443', '/books/1/', '', 'POST', '{\"Видіння\":1,\"Проблиск надії\":1,\"Необгрунтований конфлікт\":1,\"Майстер перетворень\":1,\"Зустріч з монстром\":1,\"Принцеса та лицар\":1,\"Початок шляху\":1,\"Захисний мур\":1}', 'application/json', 40495, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')"
    );
    $template3 = array(
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/css/style.css', '', 'GET', NULL, 'text/css', 2744, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/js/propLoader.js', '', 'GET', NULL, 'application/javascript', 427, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/js/engine.js', '', 'GET', NULL, 'application/javascript', 11848, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/js/controls.js', '', 'GET', NULL, 'application/javascript', 2109, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/js/main.js', '', 'GET', NULL, 'application/javascript', 13005, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/img/space.jpg', '', 'GET', NULL, 'image/jpeg', 209413, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/img/invader1.states.png', '', 'GET', NULL, 'image/png', 534, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/img/invader2.states.png', '', 'GET', NULL, 'image/png', 534, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/img/invader3.states.png', '', 'GET', NULL, 'image/png', 498, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/img/asteroids-l.states.png', '', 'GET', NULL, 'image/png', 18046, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/img/ship-trust-idle.anim.png', '', 'GET', NULL, 'image/png', 393, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/img/ship-trust-start.anim.png', '', 'GET', NULL, 'image/png', 183, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/img/crosshair.anim.png', '', 'GET', NULL, 'image/png', 4767, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/img/ship.png', '', 'GET', NULL, 'image/png', 4395, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/sound/spitfire.wav', '', 'GET', NULL, 'audio/x-wav', 76705870, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/assets/sound/shoot.mp3', '', 'GET', NULL, 'audio/mpeg', 1981, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')",
        "INSERT INTO [requests] VALUES ('https', 'urepo.online', '/favicon.ico', '', 'GET', NULL, 'image/x-icon', 15086, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')"
    );

    shuffle($template1);
    shuffle($template2);
    shuffle($template3);

    switch(rand(1, 3)) {
        case 1:
            $req->query("INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/space-demo/', '', 'GET', NULL, 'text/html', 1933, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')");
            foreach ($template1 as $sql) {
                $req->query($sql);
            }
            break;

        case 2:
            $req->query("INSERT INTO [requests] VALUES ('https', 'urepo.com.ua', '/bookreader/', 'book=1&page=8', 'GET', NULL, 'text/html', 3479, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')");
            foreach ($template2 as $sql) {
                $req->query($sql);
            }
            break;

        case 3:
            $req->query("INSERT INTO [requests] VALUES ('https', 'urepo.online', '/', '', 'GET', NULL, 'text/html', 3205, '" . $ip . "', '" . $locale[0] . "', '" . $time . "')");
            foreach ($template3 as $sql) {
                $req->query($sql);
            }
    }
?>