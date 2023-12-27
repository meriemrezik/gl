
<?php


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
    <h1>Interface du medecin </h1>
</header>

<section class="patient-list">
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
                    <th>Action</th>
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
                            <button onclick="validerLigne(this)">Valider</button>
                            <button onclick="annulerLigne(this)">Annuler</button>
                        </td>
                            
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
<script>
     function validerLigne(button) {
        // Ajoutez ici le code pour valider la ligne (peut-être une requête AJAX, etc.)
        alert("Ligne validée!");
        
        
        button.parentNode.innerHTML = "consultation validée!";
    }

    function annulerLigne(button) {
        // Ligne parente du bouton
        var row = button.parentNode.parentNode;

        // Ajoutez ici le code pour annuler la ligne (peut-être supprimer la ligne)
       
        alert("Ligne annulée!");
        button.parentNode.innerHTML = "consultation annuler!";
    }
</script>



    <?php else : ?>

        <p>Aucun patient trouvé.</p>
    <?php endif; ?>

</section>

</body>
</html>