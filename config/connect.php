<?php 

$dsn = "mysql:host=localhost;dbname=location_immobilier";
$user = "root";
$pass = "";
try
{
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e)
{
    die("error ". $e->getMessage());
}



?>