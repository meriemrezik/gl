<?php
session_start();
echo'<link  rel="stylesheet"  href="plan.css">';
?> 
 <!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>form</title>
            <link rel="stylesheet" href="formpa.css">
           
            <body>

               
                
                <form action="" method="post">
                    <h2>Ajouter un Médecin</h2>
                    <label >Nom du médecin:</label>
                    <input type="text" id="nom" name="nom" ><br>
                
                    <label >Code:</label>
                    <input type="text" id="Code" name="Code" ><br>
                
                    <label >Spécialité:</label>
                    <select id="Spécialité" name="Spécialité:" >
                        <option value="cardiologie">Cardiologie</option>
                        <option value="pédiatrie">Pédiatrie</option>
                        <option value="dermatologie">Dermatologie</option>
                       
                    </select><br>
                    <label >Mail:</label>
                    <input type="email" id="Mail" name="Mail" ><br>
                    <label >Num Tel:</label>
                    <input type="text" id="NumTel" name="NumTel" max="10" min="10"><br>
                
                    <input type="submit" value="Ajouter Médecin">
                </form>
                
                </body>
                </html>