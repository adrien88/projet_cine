<?php

// Fiche du films -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$retour = $PDO->query('SELECT * FROM films');
$data = $retour->fetchAll();
$genreList = [];
foreach($data as $row){
  foreach($row as $key => $value){
    if($key == 'genre' && !in_array($value, $genreList)){
      $genreList[] = $value;
    }
  }
}
$tabcontroler = ['films' => $data, 'genres' => $genreList, 'printHeader'=>true];

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
