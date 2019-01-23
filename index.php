<?php

//  display errors
ini_set('display_errors','1');

// load config
$CONFIG = parse_ini_file('config.ini',1)['site'];

// chargement automatique des class
spl_autoload_register(function ($class) {
    include 'model/php/'.$class.'.class.php';
});

session_start();

// Import PHP PDO
require_once 'model/php/pdo.php';

// inlude twig
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('public/tpl');
// $twig = new Twig_Environment($loader, ['cache' => 'public/cache']);
$twig = new Twig_Environment($loader, ['cache' => false]);


// include 'lib/model/php/router.class.php';
// // Creer le routage
$landingDefaut=$CONFIG['landing'];
$getStruct = ['page','args'];
//  : effecer arg array si vide et passer merge $_GET DANS la métrhode auto et faire disparare GET[0]
$_GET=router::auto($landingDefaut,$getStruct);
// echo '$_GET <br><pre> '.print_r($_GET,1).'</pre>';
// $_GET['page']='home.html';

$defauttwig = [
  'docRoot' => $_GET['docRoot'],
  'siteLang' => $CONFIG['lang'],
  'sitetitle' => $CONFIG['sitetitle'],
  'sitedescription' => $CONFIG['sitedescription'],
  'sitelogo' => 'public/images/logo.svg'
];

if(!isset($_SESSION['id']) && $_GET['page']=='profil.php'){
  header('Location:./');
  exit;
}


$callcontroler = 'controler/'.$_GET['page'].'.php';
$callhtml = 'public/tpl/'.$_GET['page'].'.html.twig';

if(file_exists($callcontroler)){
  include $callcontroler;
}
elseif (!file_exists($callhtml)){
  $tabcontroler = [];
  $callhtml = 'public/tpl/404.html.twig';
}

$twigrender = array_merge($defauttwig, $tabcontroler);

// echo '<pre>'.print_r($twigrender,1).'</pre>';
echo $twig->render($_GET['page'].'.html.twig', $twigrender);
