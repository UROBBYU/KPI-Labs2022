<?php
    $s = new PDO("sqlsrv:Server=localhost,1433;Database=TestingDB", "testname", "testpass");
    $s->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $s->query('SELECT * FROM users');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($rows);