<?php

$erreur ='';

if(isset($_POST) and !empty($_POST)) {

   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = $_POST['mdpconnect'];

   $requser = $PDO->prepare("SELECT * FROM user WHERE email = ?"); //verifier si l'user existe bien
   $requser->execute(array($mailconnect));

   // si la requête n'aboutit pas, (au hasard baltazar : l'utilisateur n'existerait pas) ben ça retourne un booléen false.
   if($requser != false)  {
     $userinfo = $requser->fetch();

    if(
      !empty($mdpconnect) AND
      crypt($mdpconnect,md5($mailconnect)) == $userinfo['password']
    ){
       $_SESSION['id'] = $userinfo['id'];
       $_SESSION['pseudo'] = $userinfo['pseudo'];
       $_SESSION['email'] = $userinfo['email'];
       header('Location:edit-profil');
       exit;

      } else {
         $erreur = "Mauvais mail ou mot de passe.";
      }
   } else {
      $erreur = "L'utilisateur n'éxiste pas.";
   }
}
$tabcontroler = ['erreur'=>$erreur];



?>
