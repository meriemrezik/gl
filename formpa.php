<?php 
session_start();
try {
    $pdo_option[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $db=new PDO('mysql:host=127.0.0.1; dbname=gl','root','');
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    catch(PDOexception $e){
        die('Erreur :'.$e->getMessage());
       
    }




// Utilisez une seule requête pour insérer les valeurs
$insert = $db->prepare("INSERT INTO medecins(``, ``,``, ``) VALUES (?, ?,?, ?) ");
$insert->execute(array( $course, $note));



header('Location:planphp.php')
?>