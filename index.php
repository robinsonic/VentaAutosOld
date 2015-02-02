<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/BaseAdmin.dwt" codeOutsideHTMLIsLocked="false" -->
<!-- DW6 -->
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administracion Principal Tienda</title>
<!-- InstanceEndEditable -->
<!--<link rel="stylesheet" href="tmp/2col_leftNav.css" type="text/css" />-->
<link rel="stylesheet" href="estilo/responsive.css" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<script src="funciones.js" language="JavaScript"></script>
<!--[if lte IE 8]-->
<script src="script/respond.js"/></script>
<!--[endif]-->
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
  <h1 id="siteName"><img src="../images/rubix.jpg" alt="Logo" width="148" height="122" />Venta Autos</h1>
  

  

  <div id="globalNav"> 
  <!--
  <ul class="egmenu">
  <li><a href="#">global link</a> | </li>
  <li><a href="#">global link</a> | </li>
  <li><a href="#">global link</a> | </li>
  <li><a href="#">global link</a> | </li>
  <li><a href="#">global link</a> | </li>
  <li><a href="#">global link</a> | </li>
  <li><a href="#">global link</a>   </li>
  </ul>
   -->
  </div>
</div>
<!-- end masthead -->



<div id="content">

  <div id="breadCrumb"> <a href="#">Autos</a> / <a href="#">Servicios</a> / <a href="#">Contactos</a> / <div id="after"></div></div>
 <!-- <h2 id="pageName">Page Name</h2>
  <div class="feature"> 
   <!-- InstanceBeginEditable name="Contenido" -->
  <!-- <h1>Bienvenido a la Administracion</h1>
   <h2>Seleccione una opcion del menu de la izquierda </h2>
   <!-- InstanceEndEditable --> <!-- </div>-->
   
   <div id="resultados"><?php include("includes/productoslista.php");?></div>
   
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
  <div ><?php include("includes/catalogo.php");?></div>
  <div id="sectionLinks">
 <!--<div id="sectionLinks">--> <?php include("loginforms.php"); ?> <!--</div>-->
  
   <!--- <ul>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
      <li><a href="#">sectionLink</a></li>
    </ul>-->
  </div>
 <!-- <div class="relatedLinks">
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
  </div>-->
</div>
<!--end navbar -->
<div id="siteInfo"><!--Administracion Tienda Online--></div>
<br />
</body>
<!-- InstanceEnd --></html>
