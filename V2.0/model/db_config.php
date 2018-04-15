<?php

const DB_NAME = 'friendbook';
const DB_IP = 'localhost';
const DB_PORT = '3306';
const DB_USER = '';
const DB_PASS = '';

try {
    $dsn = "mysql:host=" . DB_IP . ":" . DB_PORT . ";dbname=" . DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $GLOBALS["pdo"] = $pdo;

}
catch (PDOException $e) {
    $e->getMessage();
//    die();
}


