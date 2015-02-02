<?php include('../Connections/connect.php'); 
session_start();
$username= $_SESSION['usuario'];
?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tblproducto (strNombre, strSEO, dblPrecio, intEstado, intCategoria, strImagen) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strSEO'], "text"),
                       GetSQLValueString($_POST['dblPrecio'], "double"),
                       GetSQLValueString($_POST['intEstado'], "int"),
					   GetSQLValueString($_POST['intCategoria'], "int"),
                       GetSQLValueString($_POST['strImagen'], "text"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect) or die(mysql_error());

  $insertGoTo = "productos_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_connect, $connect);
$query_Recordset1 = "SELECT * FROM tblproducto ORDER BY tblproducto.strNombre ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $connect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

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
<title>Administracion Principal</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" href="../tmp/2col_leftNav.css" type="text/css" />
<link href="../estilo/twoColFixLtHdr.css" rel="stylesheet" type="text/css" />
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
   
   <h1>A&ntilde;adir Productos </h1>
   <p>&nbsp;</p>
  
   
   <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right">Nombre:</td>
          <td><input type="text" name="strNombre" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right"><!--SEO:--></td>
          <td><input type="hidden" name="strSEO" value="<?php echo $username; ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Precio:</td>
          <td><input type="text" name="dblPrecio" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Imagen:</td>
          <td><label>
            <input name="strImagen" type="text" id="strImagen" />
            <input name="button" type="button" id="button" value="subir imagen" onclick="javascript:subirimagen();"/>
          </label></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Estado:</td>
          <td><select name="intEstado">
              <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Activo</option>
              <option value="0" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>Inactivo</option>
            </select>          </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Categoria:</td>
          <td><label>
            <select name="intCategoria" id="intCategoria">
              <?php
do {  
?>
              <option value="<?php echo $row_ConsultaCategorias['idCategoria']?>"><?php echo $row_ConsultaCategorias['strDescripcion']?></option>
              <?php
} while ($row_ConsultaCategorias = mysql_fetch_assoc($ConsultaCategorias));
  $rows = mysql_num_rows($ConsultaCategorias);
  if($rows > 0) {
      mysql_data_seek($ConsultaCategorias, 0);
	  $row_ConsultaCategorias = mysql_fetch_assoc($ConsultaCategorias);
  }
?>
            </select>
          </label></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input type="submit" value="Insertar Producto"></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1">
    </form>
    <p>&nbsp;</p>
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
mysql_free_result($Recordset1);

mysql_free_result($ConsultaCategorias);
?>

