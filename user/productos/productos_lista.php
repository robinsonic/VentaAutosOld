<?php include('../Connections/connect.php'); 
session_start();
$username= $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])){
header ("Location: index.html");
}
$username= $_SESSION['usuario'];
?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_connect, $connect);

/*------SELECT PRODUCTOS DEL USUARIO-----------*/
$query_Recordset1 = "SELECT * FROM tblproducto WHERE strSEO= '$username' ORDER BY tblproducto.strNombre ASC";
/*------------END SELECT-----------------------*/

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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/BaseAdmin.dwt" codeOutsideHTMLIsLocked="false" -->
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administracion Principal</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" href="../includes/2col_leftNav.css" type="text/css" />
<link href="../includes/twoColFixLtHdr.css" rel="stylesheet" type="text/css" />
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
   <h1>Lista de Productos</h1>
   <p><a href="productos_add.php">A&ntilde;adir Producto</a></p>
   <table width="741" height="76" <!--border="1"-->
     <tr class="tablaprincipal" bgcolor="#66CCCC">
       <td width="105">Nombre Producto </td>
       <td width="165">Estado</td>
       <td width="188">Acciones</td>
     </tr>
     
       <?php do { ?>
	   <tr class="brillo">
         <td><?php echo $row_Recordset1['strNombre']; ?></td>
         <td><?php echo $row_Recordset1['intEstado']; ?></td>
         <td><a href="productos_edit.php?recordID=<?php echo $row_Recordset1['idProducto']; ?>">Editar</a> - <a href="productos_delete.php?rec=<?php echo $row_Recordset1['idProducto']; ?>">Eliminar</a> </td>
		 </tr>
         <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
   </table>
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
?>
