<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Administracion Principal Tienda</title>

<link rel="stylesheet" href="includes/2col_leftNav.css" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>

<body>
<div id="masthead">
  <h1 id="siteName"><img src="uploads/rubix.jpg" alt="Logo" width="148" height="122" />Venta Autos</h1>
  <div id="globalNav"> <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> </div>
</div>
<!-- end masthead -->
<div id="content">
  <div id="breadCrumb"> <a href="#">breadcrumb</a> / <a href="#">breadcrumb</a> / <a href="#">breadcrumb</a> / </div>
  <h2 id="pageName">Perfil de Usuario</h2>
  <div class="feature"> 
  
   <!-- InstanceBeginEditable name="Contenido" -->
   <h1>Bienvenido a tu Perfil</h1>
   <h2>Seleccione una foto de perfil </h2>
   
   
   <p>
   
 <!-----------------------------------PARTE DE AYOUB (FORMULARIO HTML QUE SELECCIONA EL AVATAR Y LO GUARDA A TRAVES DE UPLOADAVATAR.PHP)---------------------->
   <form action="uploadavatar.php" method="post" enctype="multipart/form-data">
Seleccione el archivo:
<input type="file" name="foto"><br>
<input type="submit" value="Enviar">

<!-----------------------------------FIN DE LA PARTE DE AYOUB-------------------------------------------->

</p>
</div>
</div>


<!--end content -->
<div id="navBar">
  <div id="search">
    <form action="#">
      <label>search</label>
      <input name="searchFor" type="text" size="10" />
      <input name="goButton" type="submit" value="go" />
    </form>
  </div>
  <div id="sectionLinks">
  
  <?php include("includes/cabeceraadmin.php");?>
   
  </div>
  
 
</div>
<!--end navbar -->
<!--<div id="siteInfo">Perfil de Usuario</div>--->
<br />
</body>
<!-- InstanceEnd --></html>
