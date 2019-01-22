<?php

if(isset($_POST)) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   $requser = $PDO->prepare("SELECT * FROM user WHERE email = ?"); //verifier si l'user existe bien

  $requser->execute(array($mailconnect));
   $userinfo = $requser->fetch();
   $userexist = $requser->rowCount();
   if($userexist == 1)  {

    if(!empty($mailconnect) AND !empty($mdpconnect)){

         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['email'] = $userinfo['email'];
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe.";
      }
   } else {
      $erreur = "L'utilisateur existe déja.";
   }
}
echo $twig->render('connexion.html.twig', ['id'=>'', 'pseudo' => '', 'email' => '', 'password' => '', 'erreur' => '']);
?>
