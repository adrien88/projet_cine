
<?php

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
