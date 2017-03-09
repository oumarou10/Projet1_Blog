<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> Page billet blog </title>
</head>

<body>

<h1 align="center"> <?php echo "Bonjour " . $_SESSION['pseudo']; ?></h1>

<div align ="center">

    <a href="Login/deconnexion.php">Se déconnecter</a>

    <h3> Ajout des billets </h3>

    <form action="affichage_blog_post.php" method="POST">

        <table>
            <tr>
                <td align="right"><label>Titre du blog : </label>
                </td>	<td><input type="text" name="titre"></td>
            </tr>

            <tr>
                <td align="right"><label>Auteur du blog : </label>
                </td>	<td><input type="text" name="auteur"></td>
            </tr>

            <tr>
                <td align="right"><label>Commentaire :</label></td>
                <td><input type="text" name="contenu"></td>
            </tr>

            <tr>
                <td align="right"><input type="submit" name="envoyer"></td>
            </tr>
        </table>

    </form>

</div>


<h3 align="center"> Les commentaires :</h3>

<ul>
    <?php
    foreach ($comments as $comments) // avec le while on affiche tout ce qui a été récupéré
    {
    ?>
    <li><?php echo $comments['id'] . ' - <strong> ' .$comments['auteur'] . '</strong> : ' .$comments['commentaire'];?>

        <form action="suppression_com.php" method="POST">
            <input type="hidden" name="id_com" value="<?php echo $comments['id'];?>">
            <input type="hidden" name="token" value="<?php echo $token;?>">
            <input type="submit" name="validation_suppression" value="supprimer">
        </form>
        <hr />
        <?
        }
        ?>
</ul>


<h3 align="center"> Les billets : </h3>
<?
foreach ($billets as $billets)
{
?>
<div>

    <p>
    <li> <?php echo htmlspecialchars($billets['id']) . '-' . htmlspecialchars($billets['auteur']) .' : '. htmlspecialchars($billets['titre']) . ' Le ' . $billets['date_modif']; ?>
    </p>
</div>

<div>
    <p> <?php echo $billets['contenu']; ?> </p>
    <p>
    <form action="suppression.billet.php" method="POST">
        <input type="hidden" name="id_bill" value="<?php echo $billets['id'];?>">
        <input type="hidden" name="token" value="<?php echo $token;?>">
        <input type="submit" name="validation_suppression" value="supprimer">
    </form>
    </p>

    <p> <a href="modification_blog.php?id=<?php echo $billets['id'];?>"> Modifier le billet </a>
    </p>
    </li>
    <hr />
    <?
    }
    ?>
</div>
</body>
