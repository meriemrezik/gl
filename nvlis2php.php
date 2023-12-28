<?php
session_start();
try {
    $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $db = new PDO('mysql:host=127.0.0.1; dbname=gl', 'root', '');
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOexception $e) {
    die('Erreur :' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['medecin'] as $patient_id => $medecin_id) {
        $insert = $db->prepare("UPDATE patien SET medecin = ? WHERE id = ?");
        $insert->execute(array($medecin_id, $patient_id));
    }


    header('Location: nvlis2.php');
}
?>
