<?php
try {
  
	$host = "localhost";
	$dbname = "acn_issues";
	$user = "root";
	$pass = "dacamon";
 
  # MySQL with PDO_MYSQL
  $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
 
  
}
catch(PDOException $e) {
    echo $e->getMessage();
}