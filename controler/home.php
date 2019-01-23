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
$tabcontroler = ['films' => $data, 'genres' => $genreList, 'docRoot' => ''];


if(isset($_GET['args'][0])){
  // afficher un seul films
  $film = str_replace('.',' ',$_GET['args'][0]);

  $retour = $PDO->query('SELECT * FROM films WHERE titre = \''.$film.'\'');
  $data = $retour->fetch();
  $tabcontroler = ['film' => $data, 'docRoot' => '../'];
}

// // Rechercher un film
if(isset($_GET['args'][1])){
  $genre = $_GET['args'][1];

  $retour = $PDO->query("SELECT * FROM films WHERE genre LIKE '%".$genre."%'");
  $data = $retour->fetchAll();
  $tabcontroler = ['filmsrecherches' => $data, 'docRoot' => '../../'];
}
