<?php



 $host="localhost";
     $user="root";
     $pwd="root";
     $dbName="patient";
    //    $dsn= "mysql:host=$host;dbname=$dbName";
  $dsn="mysql:host=localhost;dbname=$dbName;charset=UTF8";

try{
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    	$pdo = new PDO($dsn, $user, $pwd,$options);
    
//     $conn=new PDO($dsn, $user, $pwd);
//     $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//   echo 'gooooood';  
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}
