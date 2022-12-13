<?php 
require_once 'database.php';




// On récupère les informations du formulaire grace à la méthode POST : 
if(isset($_POST['name']))
{
    $name =  htmlspecialchars($_POST['name']); 
    // Ajout en BDD
    $insert = $db->prepare('INSERT INTO  argonaute (praenomen) VALUES ( ? )');
    $insert->execute([$name]);
 
}

// Recupération des argonautes dans la bdd 
function getArgo($db) : array
{
    $request = $db->query('SELECT * FROM argonaute');
    if($request ===false){
        die('Erreur SQL');
    }
    $result = $request->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}





