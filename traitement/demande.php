<?php
$sql = "SELECT user.* FROM user INNER JOIN lien ON user.id=idUtilisateur2 AND etat='attente' AND idUtilisateur1=?";
$q = $pdo->prepare($sql);
$q->execute(array($_SESSION['id']));
 while($l=$q->fetch()) {
         ?> <li><h3> <?php echo $l['login'] ?> </h3></li>
<?php
}


?>