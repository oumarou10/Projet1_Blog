<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> Blog </title>
</head>

<body>

<h1>Mon super blog</h1>

<p> <a href="Espace_admin/Login/connexion.php"> Lien vers page admin </a> </p>

<p>Derniers billets du blog :</p>

<?php

foreach ($donnees as $donnees) {
    ?>
    <div>
        <h3><?php echo htmlspecialchars($donnees['auteur']) .' '. htmlspecialchars($donnees['titre']) . ' Le ' . $donnees['date_modif']; ?></h3>
    </div>

    <div>
        <p> <?php echo $donnees['contenu']; ?> </p>
        <p> <a href="Controller/comments.php?id=<?php echo $donnees['id']; ?>"> Commentaires du billet </a> </p>
        <hr />
    </div>

    <?php
}
for ($i=1; $i < $nbBillets ; $i++)
{
    echo "<a href=\"index.php?p=$i\">$i/</a> ";
}
?>

</body>
</html>