	<?php 
$mailnl = ($_POST['email']);

// insertion de la news dans sa table: 
$q = $PDO->prepare("INSERT INTO newsletter (email) VALUES(?)"); 
$q->execute(array($mailnl));
$erreur = "Votre compte a bien été créé !";
?>