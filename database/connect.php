<?php 
$server = 'localhost';
$user = 'root';
$pwd = '';
$dbname = 'blogg';

$nomi = new MySQLi($server, $user, $pwd, $dbname);

if($nomi->connect_error){
    die('database connection error' . $nomi->connect_error);
}

?>