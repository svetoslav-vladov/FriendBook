<?php

const DB_NAME = 'friendbook';
const DB_IP = 'localhost';
const DB_PORT = '3306';
const DB_USER = 'friendbook';
const DB_PASS = 'test123';
$GLOBALS["male_default_picture"] = '../uploads/male_default_picture.png';
$GLOBALS["female_default_picture.png"] = '../uploads/female_default_picture.png';
$GLOBALS["default_cover_pic"] = '../uploads/default_cover.png';

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


