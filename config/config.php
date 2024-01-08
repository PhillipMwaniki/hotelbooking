<?php

define('HOST', 'localhost');
define('DBNAME', 'hotelbooking');
define('USER', 'root');
define('PASSWORD', 'r00troot');



try {
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . "", USER, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}
