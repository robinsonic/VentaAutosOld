<?php include('../Connections/connect.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tblproducto SET strNombre=%s, strSEO=%s, dblPrecio=%s, intEstado=%s, intCategoria=%s, strImagen=%s WHERE idProducto=%s",
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strSEO'], "text"),
                       GetSQLValueString($_POST['dblPrecio'], "double"),
                       GetSQLValueString($_POST['intEstado'], "int"),
                       GetSQLValueString($_POST['intCategoria'], "int"),
                       GetSQLValueString($_POST['strImagen'], "text"),
                       GetSQLValueString($_POST['idProducto'], "int"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($updateSQL, $connect) or die(mysql_error());

  $updateGoTo = "productos_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varProducto_DatosProducto = "0";
if (isset($_GET["recordID"])) {
  $varProducto_DatosProducto = (get_magic_quotes_gpc()) ? $_GET["recordID"] : addslashes($_GET["recordID"]);
}
mysql_select_db($database_connect, $connect);
$query_DatosProducto = sprintf("SELECT * FROM tblproducto WHERE tblproducto.idProducto=%s", $varProducto_DatosProducto);
$DatosProducto = mysql_query($query_DatosProducto, $connect) or die(mysql_error());
$row_DatosProducto = mysql_fetch_assoc($DatosProducto);
$totalRows_DatosProducto = mysql_num_rows($DatosProducto);

mysql_select_db($database_connect, $connect);
$query_ConsultaCategorias = "SELECT * FROM tblcategoria ORDER BY tblcategoria.strDescripcion ASC";
$ConsultaCategorias = mysql_query($query_ConsultaCategorias, $connect) or die(mysql_error());
$row_ConsultaCategorias = mysql_fetch_assoc($ConsultaCategorias);
$totalRows_ConsultaCategorias = mysql_num_rows($ConsultaCategorias);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/BaseAdmin.dwt" codeOutsideHTMLIsLocked="false" -->
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administracion Principal Tienda</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" href="../tmp/2col_leftNav.css" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>
<!-- The structure of this file is exactly the same as 2col_rightNav.html;
     the only difference between the two is the stylesheet they use -->
<body>
<div id="masthead">
  <h1 id="siteName"><img src="../images/rubix.jpg" alt="Logo" width="148" height="122" />E-Commerce</h1>
  <div id="globalNav"> <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> | <a href="#">global link</a> </div>
</div>
<!-- end masthead -->
<div id="content">
  <div id="breadCrumb"> <a href="#">breadcrumb</a> / <a href="#">breadcrumb</a> / <a href="#">breadcrumb</a> / </div>
  <h2 id="pageName">Page Name</h2>
  <div class="feature"> 
   <!-- InstanceBeginEditable name="Contenido" -->
  
  <script type="text/javascript">
   function subirimagen()
   {
   self.name = 'opener';
remote = open('gestionimagen.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
   }
   </script>
  
   <h1>Editar Producto </h1>
   <h2>&nbsp;
     <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
       <table align="center">
         <tr valign="baseline">
           <td nowrap align="right">Nombre:</td>
           <td><input type="text" name="strNombre" value="<?php echo $row_DatosProducto['strNombre']; ?>" size="32"></td>
         </tr>
         <tr valign="baseline">
           <td nowrap align="right">SEO:</td>
           <td><input type="text" name="strSEO" value="<?php echo $row_DatosProducto['strSEO']; ?>" size="32"></td>
         </tr>
         <tr valign="baseline">
           <td nowrap align="right">Precio:</td>
           <td><input type="text" name="dblPrecio" value="<?php echo $row_DatosProducto['dblPrecio']; ?>" size="32"></td>
         </tr>
         <tr valign="baseline">
           <td nowrap align="right">Estado:</td>
           <td><select name="intEstado">
               <option value="1" <?php if (!(strcmp(1, $row_DatosProducto['intEstado']))) {echo "SELECTED";} ?>>Activo</option>
               <option value="0" <?php if (!(strcmp(0, $row_DatosProducto['intEstado']))) {echo "SELECTED";} ?>>Inactivo</option>
             </select>
           </td>
         </tr>
         <tr valign="baseline">
           <td nowrap align="right">Categoria:</td>
           <td><select name="intCategoria">
               <?php 
do {  
?>
               <option value="<?php echo $row_ConsultaCategorias['idCategoria']?>" <?php if (!(strcmp($row_ConsultaCategorias['idCategoria'], $row_DatosProducto['intCategoria']))) {echo "SELECTED";} ?>><?php echo $row_ConsultaCategorias['strDescripcion']?></option>
               <?php
} while ($row_ConsultaCategorias = mysql_fetch_assoc($ConsultaCategorias));
?>
             </select>
           </td>
         <tr>
         <tr valign="baseline">
           <td nowrap align="right">Imagen:</td>
           <td><input type="text" name="strImagen" value="<?php echo $row_DatosProducto['strImagen']; ?>" size="32">
            <input name="button" type="button" id="button" value="subir imagen" onclick="javascript:subirimagen();"/></td>
         </tr>
         <tr valign="baseline">
           <td nowrap align="right">&nbsp;</td>
           <td><input type="submit" value="Update record"></td>
         </tr>
       </table>
       <input type="hidden" name="MM_update" value="form1">
       <input type="hidden" name="idProducto" value="<?php echo $row_DatosProducto['idProducto']; ?>">
     </form>
     <p>&nbsp;</p>
   </h2>
   <!-- InstanceEndEditable -->  </div>
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
  
  <?php include("../includes/cabeceraadmin.php");?>
   <!--- <ul>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
    </ul>-->
  </div>
  <div class="relatedLinks">
    <h3>Related Link Category</h3>
    <ul>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
    </ul>
  </div>
  <div class="relatedLinks">
    <h3>Related Link Category</h3>
    <ul>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
      <li><a href="#">Related Link</a></li>
    </ul>
  </div>
  <div id="advert"> <img src="" alt="" width="107" height="66" /> Ad copy ad copy ad copy. Ad copy ad copy. </div>
  <div id="headlines">
    <h3>Headlines</h3>
    <p> Headline <a href="#">full story...</a> </p>
    <p> Headline <a href="#">full story...</a> </p>
    <p> Headline <a href="#">full story...</a> </p>
    <p> Headline <a href="#">full story...</a> </p>
  </div>
</div>
<!--end navbar -->
<div id="siteInfo">Administracion Tienda Online</div>
<br />
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($DatosProducto);

mysql_free_result($ConsultaCategorias);
?>
