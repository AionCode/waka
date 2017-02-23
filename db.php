<?php
//definisanje parametara pristupa
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","1972629_waka");

//konekcija na bazu
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
	die("Nije uspela konekcija!");
}
mysqli_select_db ($conn, DB_NAME);
mysqli_set_charset($conn, "utf8");
 ?>