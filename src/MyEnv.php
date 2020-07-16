<?php

namespace sidspears69\myenv;

use Dotenv\Dotenv;

class MyEnv
{
    private static function loadEnv($dir) {
        var_dump($dir);
        $dotenv = Dotenv::createImmutable($dir);
        $dotenv->load();
    }
    public static function get($stroke) {
        $dir = $_SERVER['DOCUMENT_ROOT'];
        self::findAllEnv($dir);
        return $_ENV[$stroke];
    }
    private static function findAllEnv($dir) {
        if(file_exists($dir."/.env")) {
            self::loadEnv($dir);
        };
        foreach(glob($dir . '/*/') as $files) {
            var_dump($files);
            if (!pathinfo($files, PATHINFO_EXTENSION)) {
                self::findAllEnv($files);
            }
            else {
                return;
            }
        }
    }
}
