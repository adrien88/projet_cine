
<?php

ini_set('display_errors','1');

// chargement automatique des class
spl_autoload_register(function ($class) {
    include 'lib/model/php/'.$class.'.class.php';
});

// // Creer le routage
$landingDefaut='Page/Welcome.html';
$structDefaut = ['mod','func','type','arg'];

// TODO : effecer arg array si vide et passer merge $_GET DANS la métrhode auto et faire disparare GET[0]
$_GET=array_merge($_GET,router::auto($landingDefaut,$structDefaut));

echo '$_GET <br><pre> '.print_r($_GET,1).'</pre>';


//
// // inclure Controler
// include 'lib/php/movies.php';
//
//
// // inlude twig
// $loader = new Twig_Loader_Filesystem('lib/templates');
// $twig = new Twig_Environment($loader, [
//     'cache' => 'lib/cache',
// ]);
//
// echo $twig->render('index.html', ['name' => 'Fabien']);
