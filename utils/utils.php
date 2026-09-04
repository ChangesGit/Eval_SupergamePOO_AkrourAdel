<?php

function sanitize(string $data):string {
    return trim($data);
}


function connect():PDO {
    return new PDO("mysql:host={$_ENV['dbhost']};
    dbname={$_ENV['dbname']}",
    $_ENV['login'],
    $_ENV['password'],
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
