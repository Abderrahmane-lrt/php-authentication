<?php 
require "config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)){
        $stmt = $conn->prepare("SELECT * FROM client WHERE email = ? AND password = ?  ");
        $stmt->execute([$email, $password]);
        if ($stmt->rowCount() >= 1){
            session_start();
            $_SESSION['user'] = $stmt->fetch(PDO::FETCH_ASSOC);
            header("Location: locationencours.php");
        }else{
            echo "password ou email incorrect !!";
        }

    }else{
        echo "les champs obligatoires";
    }
}


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Document</title>
</head>
<body>
    <form  method="post">
        <div class="card w-50 m-auto mt-5">
            <div class="card-header">
                <h1 class="text-success">LOGIN</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <input type="email" name="email" placeholder="email" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="password" name="password" placeholder="password" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-header">
                <button class="btn btn-danger" name="login">login</button>
            </div>
        </div>
    </form>
</body>
</html>