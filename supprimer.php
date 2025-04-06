<?php require 'config/connect.php' ?>

<?php
$id =  $_GET['id'];
$stmt = $conn->prepare("DELETE FROM client WHERE id_client = ?");
$stmt->execute([$id]);
header("Location: listerC.php");



?>