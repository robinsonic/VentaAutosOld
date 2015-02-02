<?php

session_start();


$nom= $_SESSION['usuario'];
?>
<html>
<head>
<title>Problema</title>
</head>
<body>
<?php

/*--prueba--*/
$oldname=$_FILES['foto']['name'];

move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/$nom");

header("location: perfil.php"); // Redirecting To Other Page


?>
</body>
</html>