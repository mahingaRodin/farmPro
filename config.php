<?php
include_once('include/Database.php');
include_once('include/paginator.class.php');

define('test', 'test');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$dsn	= 	"mysql:dbname=".test.";host=".DB_HOST."";
$conn	=	"";
try {
	$conn = new PDO($dsn, DB_USER, DB_PASSWORD);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($conn);
$pages	=	new Paginator();
?>