
<?php

  $DB=parse_ini_file('config.ini',1)['database'];

 //  DATABASE Controler
 // Init DB connect
 try {
   $req = 'mysql:dbname='.$DB['name'].';host='.$DB['host'].';';
   $options = [
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$DB['charset']
   ];
   $PDO = new PDO ($req,$DB['login'],$DB['passwd'],$options);
 }
 catch (PDOException $e){
   print('Database connection error : '.$e);
 }

 // PDO object: $PDO
 // table name
 // tableau data :
 //  [titre] = film
 //  return
 //     -> true if all ok
 //     -> error message if error (ex : duplicate entry)
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

 // PDO object: $PDO
 // select request : SELECT * FROM Users WHERE Prenom = "adrien" etc.
 //  return
 //     -> data[0]['stuff'] if multidimentional (any lines, numbured)
 //     -> data['stuff'] if only one row matche
 //     -> SQL error message if SQL Error

 function reqSelect($PDO, $req) {
   $stat = $PDO -> prepare($req);
   $stat -> execute();
   if(
     ($error = $stat->errorInfo()[2]) &&
     !empty($error)
    ) {
     return $error;
   }
   else {
     $data = $stat->fetchAll();
     return isset($data[1]) ? $data : $data[0];
   }
 }





// echo '<pre>'.print_r(reqSelect($PDO, 'SELECT * FROM Users'),1).'</pre>';


 // reqpush($PDO,'Users',[
 //   'Prenom'=>'Jean-René',
 //   'Nom'=>'Boilley',
 //   'Departement'=>'Cote d\'Or',
 //   'Age'=>67,
 //   'Sexe'=>'homme']
 // );
