<?php

require 'connexion.php';

function getComment(){
    global $bdd;

    $req = $bdd->prepare('SELECT auteur, commentaire, date_format(date_commentaire, \'%d/%m/%Y à %Hh:%imin:%ss\') AS date_modif FROM commentaires WHERE id_billet = :id ORDER BY date_commentaire');
    $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $req->execute();

    $comments = $req->fetchAll();

    return $comments;
}