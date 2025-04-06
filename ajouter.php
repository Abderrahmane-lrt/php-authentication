<?php 
$execute = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require "config/connect.php";
    extract($_POST);
    $stmt = $conn->prepare("INSERT INTO client VALUES (null, ?, ?, ?, ?, ?)");
    $stmt->execute([$cin, $nom, $prenom, $email, $password]);
    $execute = true;
    header("Location: listerC.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Ajouter un client</title>
</head>
<body>
    <?php 
    if ($execute === true){
        echo "<h1 class='alert alert-success '>Client ajouter avec successe</h1>";
    }
    ?>
        <form  method="post">
            <div class="card w-50 m-auto mt-5">
                <div class="card-header">
                    <h2 class="text-danger">Ajouter un client</h2>
                </div>
                <div class="card-body">
                    <input type="text" placeholder="CIN " name="cin" class="form-control" required>
                    <div class="row my-3">
                        <div class="col-6">
                            <input type="text" placeholder="Nom" name="nom" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <input type="text" placeholder="Prenom" name="prenom" class="form-control" required>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <input type="email" placeholder="Email" name="email" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <input type="password" placeholder="password" name="password" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger text-white">Ajouter</button>
                </div>
            </div>
        </form>
</body>
</html>