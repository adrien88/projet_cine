
<?php

ini_set('display_errors','1');

// chargement automatique des class
spl_autoload_register(function ($class) {
    include 'model/php/'.$class.'.class.php';
});

// include 'lib/model/php/router.class.php';
// // Creer le routage
$landingDefaut='Page/Welcome.html';
$structDefaut = ['mod','func','type','arg'];

//  : effecer arg array si vide et passer merge $_GET DANS la métrhode auto et faire disparare GET[0]
$_GET=array_merge($_GET,router::auto($landingDefaut,$structDefaut));

// echo '$_GET <br><pre> '.print_r($_GET,1).'</pre>';

// inclure Controler
include 'model/php/movies.php';


//
require_once 'vendor/autoload.php';

// inlude twig
$loader = new Twig_Loader_Filesystem('public/tpl');
$twig = new Twig_Environment($loader, [
    'cache' => 'public/cache',
]);

echo $twig->render('test.html.twig', ['name' => 'Adrien']);
