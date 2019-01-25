<?php

$erreur ='';
$actionForm = 'add';
$preremplissage = [];

// afficher films soumis
$requete = $PDO->prepare('SELECT * FROM films WHERE nom = ?');
$requete->execute(array($_SESSION['pseudo']));
$listfilmsoumis =  $requete->fetchAll();

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
      // chercher le film à modifier
      $requete = $PDO->prepare('SELECT * FROM films WHERE id = ?;');
      $requete->execute(array($_GET['args'][1]));
      $data =  $requete ->fetch();
      $actionForm = 'edit';
      $preremplissage = $data;
      // [
      //   'affiche' => $data['affiches'],
      //   'affiche' => $data['affiches'],
      //   'titre' => $data['titre'],
      //   'annee' => $data['annee'],
      //   'genre' => $data['genre'],
      //   'acteurs' => $data['acteurs'],
      //   'realisateurs' => $data['realisateurs'],
      //   'description' => $data['description']
      // ];
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
     if (!empty($description)) {
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

   if ($_POST['hidden']=='add') {
     $req = "INSERT INTO films(titre, annee, genre, acteurs, realisateurs, description, affiche) VALUES(?, ?, ?, ?, ?, ?, ?)";
     $insertfilm = $PDO->prepare($req);
     $insertfilm->execute(array(
       $titre, $annee, implode(',',$genre),
       $acteurs, $realisateurs, $description,
       $_FILES['affiche']['name']
     ));
     $erreur = "Merci pour votre contribution.";
   }
   else ($_POST['hidden']=='edit') {
     // $req = "UPDATE films SET titre=?, annee=?, genre=?, acteurs=?, realisateurs=?, description=?, affiche=? WHERE id=?" ;
     $updatefilm = $PDO->prepare($req);
     $updatefilm->execute(array(
       $titre, $annee, implode(',',$genre),
       $acteurs, $realisateurs, $description,
       $_FILES['affiche']['name']
     ));
   }

 }

 $tabcontroler = [
   'actionForm' => $actionForm,
   'edititing' => $preremplissage,
   'userinfo'=> $_SESSION,
   'listfilmssoumis'=>$listfilmsoumis
 ];
