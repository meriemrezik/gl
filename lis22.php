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

    $medecin = $_POST['medecin'];
    

$insert = $db->prepare("INSERT INTO patien(`medecin`) VALUES (?) ");
$insert->execute(array($medecin));



header('Location:lis2.php')
?>
