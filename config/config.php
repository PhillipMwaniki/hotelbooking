<?php

define('HOST', 'localhost');
define('DBNAME', 'hotelbooking');
define('USER', 'root');
define('PASSWORD', 'r00troot');



try {
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . "", USER, PASSWORD);
} catch (PDOException $e) {
    die($e->getMessage());
}
