<?php

namespace sidspears69\myenv;

class MyEnv
{
    public static function get($stroke) {
        $dir = $_SERVER['DOCUMENT_ROOT'];
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        return $_ENV[$stroke];
    }
}
