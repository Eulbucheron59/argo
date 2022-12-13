<?php
try {
    $db = new PDO(
    'mysql:host=localhost;dbname=argo;charset=utf8',
    'root',
    'admin'
);
// try {
//     $db = new PDO(
//     'mysql:host=localhost;dbname=id19964728_argo;charset=utf8',
//     'id19964728_eulbucheron59',
//     'Laurette1664+'
// );
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>