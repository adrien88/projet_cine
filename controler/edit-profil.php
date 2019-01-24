<?php

$erreur ='';

// Traitement du formulaire de mise à jour du login
if (isset($_POST) && !empty($_POST)){
  if(!preg_match('#[a-z0-9]{2,}#i',$_POST['newpseudo'])){
    $erreur = "Merci de renseigner un pseudo au format <i>Robertdu36</i>.";
  }
  if(!preg_match('#[a-z0-9._-]{2,}@[a-z0-9._-]{2,}\.[a-z0-9._-]{2,}#i',$_POST['newmail'])){
    $erreur = "Merci de renseigner une adresse mail au format <i>r.bidochon@fluideglacial.fr</i>.";
  }
  if($_POST['newmdp1'] != $_POST['newmdp2']){
    $erreur = "Les mots de passe doivent correspondre.";
  }

  //  crypter le mot de passe
  $hashed = crypt($_POST['newmdp1'],md5($_POST['newmail']));
  // requeste
  $req = "UPDATE user SET pseudo=?,password=?,email=? WHERE id='".$_SESSION['id']."'";
  //  Push new
  $statmnt = $PDO->prepare($req);
  $statmnt -> execute(array($_POST['newpseudo'],$hashed,$_POST['newmail']));
  // get error
  $erreur = $statmnt -> errorInfo()[2];
  if(empty($erreur)){
    $_SESSION['pseudo']=$_POST['newpseudo'];
    $_SESSION['email']=$_POST['newmail'];
  }
}

$tabcontroler = [
  'userinfo'=> $_SESSION,
  'erreur'=> $erreur
];
