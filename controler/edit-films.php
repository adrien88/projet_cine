<?php

$erreur ='';
$actionForm = 'Ajouter';
$preremplissage = [];



// verif formulaire soumission de films
if(isset($_POST) and !empty($_POST)){
  $filmId = ($_POST['id']);
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
     if (!preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï])+?$#", $titre)){
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
     if (!preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#", $acteurs)){
        $erreur .= 'Nom incorrect';
     }

     // réalisateurs
     if (!preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#", $realisateurs))
     {
        $erreur .= 'Nom incorrect';
     }

     // commentaires
     if (!empty($description)) {
        $erreur .= "Ce champ doit être rempli";
     }

     $sqlFilename = $_POST['affiche'];

     if(
       isset($_FILES['nouvelleaffiche']) && !empty($_FILES['nouvelleaffiche'])
       && preg_match('#\.jpe?g$#i',$_FILES['nouvelleaffiche']['name'])
      ){

       $cible = 'public/images/'.$_FILES['nouvelleaffiche']['name'];
       $cible = preg_replace('#(.*)\.(jpe?g)$#i','$1', $cible).'.jpg';

       $resultat = move_uploaded_file($_FILES['nouvelleaffiche']['tmp_name'],$cible);
       if ($resultat == false){
         $erreur .= "Erreur lors du déplacement du fichier.";
       }
       else{
         $sqlFilename = preg_replace('#(.*)\.(jpe?g|png|giff?|tiff?)$#i','$1', basename($cible));
       }
     }
   }

   if ($_POST['hidden']=='Ajouter') {
     $req = "INSERT INTO films(titre, annee, genre, acteurs, realisateurs, description, affiche) VALUES(?, ?, ?, ?, ?, ?, ?)";
     $insertfilm = $PDO->prepare($req);
     $insertfilm->execute(array(
       $titre, $annee, implode(',',$genre),
       $acteurs, $realisateurs, $description, $sqlFilename
     ));
     $erreur = "Merci pour votre contribution.";
   }
   elseif ($_POST['hidden']=='Éditer') {
     $req = "UPDATE films SET titre=?, annee=?, genre=?, acteurs=?, realisateurs=?, description=?, affiche=? WHERE id=?" ;
     $updatefilm = $PDO->prepare($req);
     $updatefilm->execute(array(
       $titre, $annee, implode(',',$genre),
       $acteurs, $realisateurs, $description, $sqlFilename,$filmId
     ));
   }
   /*
    TODO : ajouter option suppresion sur le twig
   */

   elseif ($_POST['hidden']=='Supprimer') {
     $req = "DELETE films WHERE id=?" ;
     $updatefilm = $PDO->prepare($req);
     $updatefilm->execute(array(
       $filmId
     ));
   }
 }


 // afficher films soumis
 $requete = $PDO->prepare('SELECT * FROM films WHERE nom = ?');
 $requete->execute(array($_SESSION['pseudo']));
 $listfilmsoumis =  $requete->fetchAll();

   // Rechercher un film par genre
   if(
     isset($_GET['args'][0]) AND
     $_GET['args'][0] == 'Éditer'
   ){
     // Rechercher un film par genre
     if(
       isset($_GET['args'][1]) AND
       !empty($_GET['args'][1])
     ){
       $requete = $PDO->prepare('SELECT * FROM films WHERE id = ?;');
       $requete->execute(array($_GET['args'][1]));
       $data =  $requete ->fetch();
       $actionForm = 'Éditer';
       $preremplissage = $data;
     }
     // chercher le film à modifier
   }

   $listImgs=[];
   foreach(glob('public/images/*.jpg') as $file){
     $listImgs[] = basename(preg_replace('#(.*)\.(jpe?g)$#i','$1', $file));
   }


 $tabcontroler = [
   'listAffiche' => $listImgs,
   'actionForm' => $actionForm,
   'edititing' => $preremplissage,
   'userinfo'=> $_SESSION,
   'listfilmssoumis'=>$listfilmsoumis
 ];
