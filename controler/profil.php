<?php



// ouverture espace membre
if(isset($_SESSION['id']) AND $_SESSION['id'] > 0) {
 $getid = intval($_SESSION['id']);
 $requser = $PDO->prepare('SELECT * FROM user WHERE id = ?');
 $requser->execute(array($getid));
 $userinfo = $requser->fetch();
}


// afficher films soumis
$requete = $PDO->prepare('SELECT affiche FROM films WHERE nom = \''.$_SESSION['id'].'\'');
$requete->execute();
$listfilmsoumis =  $requete->fetchAll();


// verif formulaire soumission de films
if(isset($_POST) and !empty($_POST)){
  $titre = ($_POST['titre']);
  $annee = ($_POST['annee']);
  $genre = ($_POST['genre']);
  $acteurs = ($_POST['acteurs']);
  $realisateurs = ($_POST['realisateurs']);
  $description = ($_POST['description']);
  $errorMsg = "";

  if(!empty($titre) AND !empty($annee) AND !empty($genre) AND !empty($acteurs) AND !empty($realisateurs) AND !empty($description)) {

     //titre
     if (preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï])+?$#", $titre)) {
     } else {
        $errorMsg = '<li>Nom incorrect</li>';
     }

     // année
     if (preg_match("#^[0-9]{4}$#", $annee)) {
     } else {
        $errorMsg .= '<li>Date incorrecte (format AAAA)</li>';
     }

     //genre
     foreach($genre as $valeur)
     {
        echo "La checkbox $valeur a été cochée<br>";
     }
     if(!$genre){
        echo "Aucune checkbox n'a été cochée";
     }

     //acteurs
     if (preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#", $acteurs)){

     } else {
        $errorMsg .= '<li>Nom incorrect</li>';
     }
     print_r($_POST);
     // réalisateurs
     if (preg_match("#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#", $realisateurs)){
     } else {
        $errorMsg .= '<li>Nom incorrect</li>';
     }

     // commentaires
     if (!empty($description)) {}
        else {
        $errorMsg .= "<li>Ce champ doit être rempli</li>";
     }
   // ok verif
   }

   $cible = '../../public/upload/'.$_FILES['affiche']['name'];
   $resultat = move_uploaded_file($_FILES['affiche']['tmp_name'],$cible);
   if ($resultat)  $msgerror = "Transfert réussi";

   $insertfilm = $PDO->prepare("INSERT INTO films(Titre, Année, Genre, Acteurs, Réalisateurs, Description, Affiche) VALUES(?, ?, ?, ?, ?, ?, ?)");
   $insertfilm->execute(array($titre, $annee, implode(',',$genre), $acteurs, $realisateurs, $description, $_FILES['affiche']['name']));
   $msgerror = "Merci pour votre contribution.";

 }

 $tabcontroler = [
   'userinfo'=> $_SESSION,
   'listfilmssoumis'=>$listfilmsoumis
 ];
?>
