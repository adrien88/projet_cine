<?php

// Fiche des films -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$retour = $PDO->query('SELECT * FROM films ORDER BY annee DESC LIMIT 8');
$data = $retour->fetchAll();
$genreList = [];
foreach($data as $row){
  foreach($row as $key => $value){
    $tab = explode(',',$value);
    foreach($tab as $sgenre){
      if($key == 'genre' && !in_array($value, $genreList)){
        $genreList[] = $sgenre;
      }
    }
  }
}
$tabcontroler = ['films' => $data, 'genres' => $genreList, 'printHeader'=>true];


if (isset($_POST['searchFor']) and !empty($_POST['searchFor'])){
  $retour = $PDO->query('SELECT * FROM films WHERE titre LIKE \'%'.$_POST['searchFor'].'%\';');
  $data = $retour->fetchAll();
  $tabcontroler = ['filmsrecherches' => $data, 'genres' => $genreList];
}


// // Rechercher un film par genre
if(
  isset($_GET['args'][0]) AND
  $_GET['args'][0] == 'genre'
){
  if(isset($_GET['args'][1])){
    $genre = $_GET['args'][1];
    $retour = $PDO->query("SELECT * FROM films WHERE genre LIKE '%".$genre."%'");
    $data = $retour->fetchAll();
    $tabcontroler = ['filmsrecherches' => $data, 'genreRecherche' => $genre];
  }
  else{
    $tabcontroler = ['erreur' => 'Précisez un genre ci dessus.'];
  }
}

// // Rechercher un film par genre
if(
  isset($_GET['args'][0]) AND
  $_GET['args'][0] == 'film'
){
  if(isset($_GET['args'][1])){
    $film = $_GET['args'][1];
    $retour = $PDO->query('SELECT * FROM films WHERE id = \''.$film.'\'');
    $data = $retour->fetch();
    $tabcontroler = ['film' => $data];
  }
  else{
    $tabcontroler = ['erreur' => 'Précisez un film.'];
  }
}
