<?php

session_start(); // Starting Session
$error=''; // Variable To Store Error Message


// Define $username and $password
$username=$_POST['campousuario'];
$password=$_POST['campoclave'];


// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);


// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "root");


// Selecting Database
$db = mysql_select_db("dbshop", $connection);


// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from tblusuario where strPassword='$password' AND strNombre='$username'", $connection)or
      die(mysql_error($conection));
$rows = mysql_num_rows($query);
if ($rows == 1) {

$_SESSION['usuario']=$username; // Initializing Session
$_SESSION['clave']=$password; // Initializing Session
header("location: perfil.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
echo "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection


?>