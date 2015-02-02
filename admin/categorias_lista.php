<?php include('../Connections/connect.php'); ?>
<?php
mysql_select_db($database_connect, $connect);
$query_Recordset1 = "SELECT * FROM tblcategoria ORDER BY tblcategoria.strDescripcion ASC";
$Recordset1 = mysql_query($query_Recordset1, $connect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/BaseAdmin.dwt" codeOutsideHTMLIsLocked="false" -->
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Categorias Lista</title>
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
   <h1>Lista de Categor&iacute;as   </h1>
   <h1>&nbsp;</h1>
   <p><a href="categorias_add.php">A&ntilde;adir Categor&iacute;a</a> </p>
   <table width="308" <!--border="1"-->
     <tr class="tablaprincipal">
       <td width="155">Nombre de Categor&iacute;a </td>
       <td width="237">Acciones</td>
     </tr>
     <?php do { ?>
       <tr class="brillo">
          <td><?php echo $row_Recordset1['strDescripcion']; ?></td>
         <td><a href="categorias_edit.php?recordID=<?php echo $row_Recordset1['idCategoria']; ?>">Editar</a></td>
       </tr>
       <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
   </table>
   <h2>&nbsp;</h2>
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
  
</div>
<!--end navbar -->
<div id="siteInfo">Administracion Tienda Online</div>
<br />
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>

