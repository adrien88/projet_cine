
<?php


if(isset($_SESSION['id'])) {
  $requser = $PDO->prepare("SELECT * FROM user WHERE id = ?");
  $requser->execute(array($_SESSION['id']));
  $user = $requser->fetch();
  if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
     $newpseudo = htmlspecialchars($_POST['newpseudo']);
     $insertpseudo = $PDO->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
     $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
     header('Location: profil.php?id='.$_SESSION['id']);
  }
  if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
     $newmail = htmlspecialchars($_POST['newmail']);
     $insertmail = $PDO->prepare("UPDATE user SET email = ? WHERE id = ?");
     $insertmail->execute(array($newmail, $_SESSION['id']));
     header('Location: profil.php?id='.$_SESSION['id']);
  }
  if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
     $mdp1 = sha1($_POST['newmdp1']);
     $mdp2 = sha1($_POST['newmdp2']);
     if($mdp1 == $mdp2) {
        $insertmdp = $PDO->prepare("UPDATE user SET password = ? WHERE id = ?");
        $insertmdp->execute(array($mdp1, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
     } else {
        $msg = "Vos deux mdp ne correspondent pas !";
     }
  }
}
echo $twig->render('edition_profil.html.twig', ['pseudo' => 'pseudo', 'email' => 'mail1', 'password' => 'mdp1']);
?>
