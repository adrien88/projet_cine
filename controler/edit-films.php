<?php

$erreur ='';

// afficher films soumis
$requete = $PDO->prepare('SELECT affiche FROM films WHERE nom = \''.$_SESSION['id'].'\'');
$requete->execute();
$listfilmsoumis =  $requete->fetchAll();

 // Rechercher un film par genre
 // Ne rien faire ?
  if(
    isset($_GET['args'][0]) AND
    $_GET['args'][0] == 'add'
  ){
    $preremplissage = [];
  }

  // Rechercher un film par genre
  if(
    isset($_GET['args'][0]) AND
    $_GET['args'][0] == 'edit'
  ){
    // Rechercher un film par genre
    if(
      isset($_GET['args'][1]) AND
      !empty($_GET['args'][1])
    ){
      // afficher films soumis
      $requete = $PDO->prepare('SELECT * FROM films WHERE id = ?;');
      $requete->execute(array($_GET['args'][1]));
      $listdata =  $requete->fetch();
      $preremplissage = [];
    }
  }


// verif formulaire soumission de films
if(isset($_POST) and !empty($_POST)){
  $titre = ($_POST['titre']);
  $annee = ($_POST['annee']);
  $genre = ($_POST['genre']);
  $acteurs = ($_POST['acteurs']);
  $realisateurs = ($_POST['realisateurs']);
  $description = ($_POST['description']);
  $errorMsg = "";

  if(!empty($titre) AND !empty($annee) AND
  !empty($genre) AND !empty($acteurs) AND
  !empty($realisateurs) AND !empty($description)) {

     //titre
     if (preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï])+?$#", $titre)) {
     } else {
        $erreur .= 'Nom incorrect';
     }

     // année
     if (!preg_match("#^[0-9]{4}$#", $annee)) {
        $erreur .= 'Date incorrecte (format AAAA)';
     }

     if(count($genre) == 0){
        $erreur .= "Aucune checkbox n'a été cochée";
     }

     //acteurs
     if (preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#", $acteurs)){

     } else {
        $erreur .= 'Nom incorrect';
     }

     // réalisateurs
     if (preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#", $realisateurs)){
     } else {
        $erreur .= 'Nom incorrect';
     }

     // commentaires
     if (!empty($description)) {}
        else {
        $erreur .= "Ce champ doit être rempli";
     }

     if(isset($_FILES['affiche']) && !empty($_FILES['affiche'])){
       $cible = '../public/upload/'.$_FILES['affiche']['name'];
       $resultat = move_uploaded_file($_FILES['affiche']['tmp_name'],$cible);
       if ($resultat == false){
         $erreur .= "Erreur lors du déplacement du fichier.";
       }
     }

   // ok verif
   }


   if ($resultat)  $msgerror = "Transfert réussi";

   $insertfilm = $PDO->prepare("INSERT INTO films(Titre, Année, Genre, Acteurs, Réalisateurs, Description, Affiche) VALUES(?, ?, ?, ?, ?, ?, ?)");
   $insertfilm->execute(array($titre, $annee, implode(',',$genre), $acteurs, $realisateurs, $description, $_FILES['affiche']['name']));
   $msgerror = "Merci pour votre contribution.";

 }

 $tabcontroler = [
   'precomplet' => $preremplissage,
   'userinfo'=> $_SESSION,
   'listfilmssoumis'=>$listfilmsoumis
 ];
