<?php require "config/connect.php" ?>
<?php 
$query = "SELECT * FROM client";
$stmt = $conn->prepare($query);
$stmt->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.css">
    <title>LISTE CLIENTS</title>
</head>
<body>
    <h1 class="alert alert-success text-white text-center">
        Liste Clients
    </h1>
    <a href="ajouter.php" class="position-absolute end-0 me-4 btn btn-primary text-white">ajouter Client</a>

    <table class="w-75 m-auto table table-striped">
        <thead>
        <tr>
            <th>cin</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>password</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr >
                <td><?= $client['cin'] ?></td>
                <td><?= $client['nom'] ?></td>
                <td><?= $client['prenom'] ?></td>
                <td> <?= $client['email'] ?></td>
                <td><?= $client['password'] ?></td>
                <td><a href="supprimer.php?id=<?= $client['id_client'] ?>" onclick="return confirm('Vous voulez vraiment supprimer ce client ?')">Supprimer</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>