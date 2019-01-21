
<?php

//  display errors
ini_set('display_errors','1');

// chargement automatique des class
spl_autoload_register(function ($class) {
    include 'model/php/'.$class.'.class.php';
});

// include 'lib/model/php/router.class.php';
// // Creer le routage
$landingDefaut='Page/Welcome.html';
$getStruct = ['page','args'];

//  : effecer arg array si vide et passer merge $_GET DANS la métrhode auto et faire disparare GET[0]
$_GET=router::auto($landingDefaut,$getStruct);
echo '$_GET <br><pre> '.print_r($_GET,1).'</pre>';

// inclure Controler
include 'model/php/movies.php';

// include controlers
// switch($_GET['page']){
//   case 'home_html':
//     include '';
//   break;
//   case 'login_html':
//     include '';
//   break;
//   case 'dash_html':
//     include '';
//   break;
//   case 'movies_html':
//     include '';
//   break;
//   default :
//     include '';
//   break;
// }


require_once 'vendor/autoload.php';

// inlude twig
$loader = new Twig_Loader_Filesystem('public/tpl');
$twig = new Twig_Environment($loader, ['cache' => 'public/cache']);

echo $twig->render('test.html.twig', ['name' => 'Adrien']);
