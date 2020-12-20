<?php
$connect = new PDO("mysql:host=localhost; dbname=educo", "root", "");
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "educo"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
