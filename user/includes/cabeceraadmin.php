<?php

//session_start();

if (!isset($_SESSION['usuario'])){
//header ("Location: index.html");
session_start();
}

$username= $_SESSION['usuario'];
if ($username==null){
header ("Location: index.html");
}

?>
<p>

<?php

if (file_exists ( "uploads/$username")){

echo "<img src=\"uploads/$username\" width=\"50\" height=\"50\">";
}else
{
echo "<img src=\"uploads/default\" width=\"50\" height=\"50\">";
}


//echo $username;
?>
<a href="perfil.php"><?php echo $username;?> </a>
</p>
<p> <a href="logout.php">Salir</a></p>
<p> <a href="selectavatar.php">Mis Datos</a></p>
<p> <a href="productos_lista.php">Mis Anuncios</a></p>

<?php include("../includes/catalogo.php");?>
