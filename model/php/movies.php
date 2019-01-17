
<?php

  $DB = [
    'name'=>'Cafeinline',
    'host'=>'localhost',
    'login'=>'Next',
    'passwd'=>'Next'
  ];

 //  DATABASE Controler
 // Init DB connect
 try {
   $req = 'mysql:dbname='.$DB['name'].';host='.$DB['host'].';';
   $options = [
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
   ];
   $PDO = new PDO ($req,$DB['login'],$DB['passwd'],$options);
 }
 catch (PDOException $e){
   print('Database connection error : '.$e);
 }


 // PDO
 // nom de la table
 //tableau data :
 //  [titre] = film
 function reqpush($PDO, $table, array $data) {
   // formater la requête
   $prepreq = implode(',',array_keys($data));
   $prepval = ':'.implode(',:',array_keys($data));
   // Sand
   $req = "INSERT INTO $table ($prepreq) VALUES ($prepval)";
   echo $req;
   $stat = $PDO -> prepare($req);
   $stat -> execute($data);
   if(
     ($error = $stat->errorInfo()[2]) &&
     !empty($error)
   ) {
     return $error;
   }
   else {
     return true;
   }

 }

 reqpush($PDO,'User',[
   'Prenom'=>'Jean-René',
   'Nom'=>'Boilley',
   'Departement'=>'Cote d\'Or',
   'Age'=>67,
   'Sexe'=>'homme']
 );
