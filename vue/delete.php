<?php 
session_start();

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `argonaute` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $argo = $query->fetch();

    // On vérifie si le produit existe
    if(!$argo){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
        die();
    }

    $sql = 'DELETE FROM `argonaute` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    $_SESSION['message'] = "Argo supprimé";
    header('Location: index.php');


}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}

include '../layout/footer.php';