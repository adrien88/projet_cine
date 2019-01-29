<?php

//  display errors
// ini_set('display_errors','1');


/*
    load config
*/
$CONFIG = parse_ini_file('config.ini',1)['site'];

/*
    Autoloading of PHP class
*/
spl_autoload_register(function ($class) {
    include 'model/php/'.$class.'.class.php';
});

/*
    start session
*/
session_start();

/*
    Import PDO
*/
require_once 'model/php/pdo.php';

/*
    Include TWIG, Create a TWIG Environement
*/
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('public/tpl');
// $twig = new Twig_Environment($loader, ['cache' => 'public/cache']);
$twig = new Twig_Environment($loader, ['cache' => false]);

/*
    Creer le routage
*/
$landingDefaut=$CONFIG['landing'];
$getStruct = ['page','args'];
$_GET=router::auto($landingDefaut,$getStruct);
// echo '$_GET <br><pre> '.print_r($_GET,1).'</pre>';

/*
    Le visiteur non loggé n'a pas acces à la page edition
*/
if(!isset($_SESSION['id']) && preg_match('#edit-#',$_GET['page'])){
  header('Location:./');
  exit;
}

if(!isset($_SESSION['id'])){
  $compteID = 'invité';
}
else {
  $compteID = $_SESSION['pseudo'];
}

/*
    Créer les variables d'environnement pour twig
*/
$defauttwig = [
  'docRoot' => $_GET['docRoot'],
  'siteLang' => $CONFIG['lang'],
  'sitetitle' => $CONFIG['sitetitle'],
  'sitedescription' => $CONFIG['sitedescription'],
  'compteId' => $compteID,
  'sitelogo' => 'public/images/logo.png'
];

/*
    Defing file to load / import / include
*/
$callcontroler = 'controler/'.$_GET['page'].'.php';
$callhtml = 'public/tpl/'.$_GET['page'].'.html.twig';
$tabcontroler = [];
/*
    Import controller (if exist)
*/
if(file_exists($callcontroler)){
  include $callcontroler;
}
/*
    Import 404 cause nothing exist
*/
elseif (!file_exists($callhtml)){
  $callhtml = 'public/tpl/404.html.twig';
}

/*
    Merge Var fot TWIG
*/
$twigrender = array_merge($defauttwig, $tabcontroler);

// echo '<pre>'.print_r($twigrender,1).'</pre>';
/*
    RENDER TWIG
*/
echo $twig->render($_GET['page'].'.html.twig', $twigrender);
