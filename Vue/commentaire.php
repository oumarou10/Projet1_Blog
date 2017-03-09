<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title> Commentaires </title>
</head>
<body>

<?php

foreach ($comments as $comment)
{
    ?>
    <p> Auteur : <?php echo htmlspecialchars($comment['auteur']); ?> </p>
    <p> Commentaires : <?php echo nl2br(htmlspecialchars($comment['commentaire'])) . ' le ' . $comment['date_modif'];?> </p>
    <?
}
?>

<form action="commentspost.php" method="POST">

    <input style="display: none;" type="text" name="billet" value="<?php if(isset($_GET['id'])) { echo $_GET['id'];} ?>">

    <label> Pseudo </label> <input type="text" name="auteur">
    <label> Email </label> <input type="email" name="email">
    <label> Commentaire* </label> <input type="text" name="commentaire">
    <input type="submit" name="envoyer">

</form>

<p><a href="../index.php"> Retourner aux billets </a></p>

</body>
</html>