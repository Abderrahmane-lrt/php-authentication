<?php require "config/connect.php" ?>
<?php 
$locations = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['date_debut']) && isset($_GET['date_fin'])){
    $date_debut = $_GET['date_debut'];
    $date_fin = $_GET['date_fin'];

    $query = "SELECT l.id_location, c.nom, i.titre, l.date_debut_location, l.date_fin_location 
        FROM location AS l INNER JOIN client AS c ON l.id_client = c.id_client
        INNER JOIN immobilier AS i ON l.id_immobilier = i.id_immobilier
        WHERE l.date_debut_location <= ? AND l.date_fin_location >= ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->execute([$date_debut, $date_fin]);
    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.css">
    <title>LISTE LOCATION</title>
</head>
<body>
    <form  method="get">
        <div class="card w-50 m-auto mt-4">
            <div class="card-header">
                <h4>rechercher par date</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <input type="date" name="date_debut" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="date" name="date_fin" class="form-control">
                    </div>
                </div>  
            </div>
            <div class="card-footer">
                <button class="btn btn-danger">Rechercher</button>
            </div>
        </div>
    </form>

    <table class="w-75 m-auto table table-striped mt-4">
        <thead>
            <tr>
                <th>Id location</th>
                <th>Nom client</th>
                <th>titre immobilier</th>
                <th>Date debut location</th>
                <th>Date fin location</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($locations as $loc): ?>
        <tr>
            <td><?= $loc['id_location'] ?></td>
            <td><?= $loc['nom'] ?></td>
            <td><?= $loc['titre'] ?></td>
            <td><?= $loc['date_debut_location'] ?></td>
            <td><?= $loc['date_fin_location'] ?></td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>