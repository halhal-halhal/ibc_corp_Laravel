<?php

return [
    "fetch" => PDO::FETCH_CLASS,
    "default" => env("DB_CONNECTION"),
    "connections" => [
        "mysql" => [
            "driver"    => "mysql",
            "host"      => env("DB_HOST", 'localhost'),
            "database"  => env("DB_DATABASE", 'it_bootcamp'),
            "username"  => env("DB_USERNAME", 'root'),
            "password"  => env("DB_PASSWORD", 'root'),
            //MAMPのUnixSocketを追記
            'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
            "charset"   => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix"    => "",
            "strict"    => false,],],
    "migrations" => "migrations",
    "redis" => [
        "cluster" => false,
        "default" => [
            "host"     => env("REDIS_HOST"),
            "password" => env("REDIS_PASSWORD"),
            "port"     => env("REDIS_PORT"),
            "database" => 0,],],];
