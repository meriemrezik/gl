<?php
session_start();
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gl";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}


$sql = "SELECT id,nom,mail,numero,rendezvous,adresse,typeconsultation,specialite FROM patien";
$result = $conn->query($sql);

// Vérifier si la requête s'est exécutée correctement
if ($result === false) {
    die("Erreur dans la requête: " . $conn->error);
}


$patients = array();

if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }
} else {
    echo "Aucun patient trouvé.";
}






// Exemple de requête pour extraire les médecins de la base de données
$query = "SELECT * FROM medecins";
$result = mysqli_query($conn, $query);

$medecins = array();
while ($row = mysqli_fetch_assoc($result)) {
    $medecins[] = $row;
}




$conn->close();
echo'<link rel="stylesheet" href="liscss2.css">';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Patients</title>
</head>
<body>

<header>
    <h1>Interface du Gestionnaire</h1>
</header>

<section class="patient-list">
<form action="lis22.php" method="post">
    <h2>Liste des Patients</h2>

   <?php
 if (!empty($patients)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom </th>
                 
                    <th>Email</th>
                    <th>numero</th>
                    <th>Rendez-vous</th>
                    <th>Adresse</th>
                    <th>Type consultation</th>
                    <th>Specialite</th>
                    
                    <th>Affectation d'un medecin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient) : ?>
                    <tr>
                    <td><?php echo $patient['id']; ?></td>
                        <td><?php echo $patient['nom']; ?></td>
                       
                        <td><?php echo $patient['mail']; ?></td>
                        <td><?php echo $patient['numero']; ?></td>
                        <td><?php echo $patient['rendezvous']; ?></td>
                       
                        <td><?php echo $patient['adresse']; ?></td>
                        <td><?php echo $patient['typeconsultation']; ?></td>
                        <td><?php echo $patient['specialite']; ?></td>
                       
                         
                            <td>
                            <input type="hidden" name="patient_id" value="<?php echo $patient['id']; ?>">
                            <select  name="medecin" id="medecin<?php echo $patient['id']; ?>">
                                <?php foreach ($medecins as $medecin) : ?>
                                    <option  value="<?php echo $medecin['id']; ?>"><?php echo $medecin['nom'] . ' '. $medecin['specialite']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="checkbox"   name="affecter" value="affecter">
                            <input type="submit" value="envoyer"  >
                                </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else : ?>

        <p>Aucun patient trouvé.</p>
    <?php endif; ?>
    </form>

</section>

</body>
</html>

