<?php


    if(isset($_POST) and !empty($_POST)){//l'utilisateur a cliqué sur "S'inscrire", on demande donc si les champs sont définis avec "isset"

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail1 = htmlspecialchars($_POST['mail1']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp1 = sha1($_POST['mdp1']);
    $mdp2 = sha1($_POST['mdp2']);
    print_r($_POST);

    if(!empty($pseudo) AND !empty($mail1) AND !empty($mail2) AND !empty($mdp1) AND !empty($mdp2)) {
        $pseudolength = strlen($pseudo);
        $requser = $PDO->prepare("SELECT * FROM user WHERE pseudo = ?"); //vérifier si l'user existe bien
      $requser->execute(array($pseudo));
      $userexist = $requser->rowCount();
        $messageerror = $requser->errorInfo()[2]; //evite pseudo doublé (index unique)
        if($pseudolength <= 25) {
            if($userexist == 0){
            if($mail1 == $mail2) {
              if(filter_var($mail1, FILTER_VALIDATE_EMAIL)) {
                 $reqmail = $PDO->prepare("SELECT * FROM user WHERE email = ?");
                 $reqmail->execute(array($mail1));
                 $mailexist = $reqmail->rowCount();
                 if($mailexist == 0) {
                    if($mdp1 == $mdp2) {
                       $insertmbr = $PDO->prepare("INSERT INTO user(pseudo, email, password) VALUES(?, ?, ?)");
                       $insertmbr->execute(array($pseudo, $mail1, $mdp1));
                       $erreur = "Votre compte a bien été créé !";
                       header("Location: profil.php");
                       exit;
                    }
                     else {
                       $erreur = "Vos mots de passe ne correspondent pas !";
                    }
                 } else {
                    $erreur = "Adresse mail déjà utilisée !";
                 }
              } else {
                 $erreur = "Votre adresse mail n'est pas valide !";
              }
            } else {
                $erreur = "Vos adresses mail ne correspondent pas !";
            }
           } else {
              $erreur = "Pseudo déja utilisé !";
           }
        } else {
           $erreur = "Votre pseudo ne doit pas dépasser 25 caractères !";
        }
     }
     else {
        $erreur = "Tous les champs doivent être complétés !";
     }

    }

$tabcontroler = [];

?>
