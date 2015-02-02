<?php include('../Connections/connect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
}

mysql_select_db($database_connect, $connect);
$query_Recordset1 = "SELECT * FROM tblcategoria ORDER BY tblcategoria.strDescripcion";
$Recordset1 = mysql_query($query_Recordset1, $connect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!--<nav class="egmenu">-->
<ul class="egmenu">
<?php echo "<li><h3>Categorias:</h3></li>";do { ?>
 <li> <a href="scripts/pagina.php?recordID=<?php echo $row_Recordset1['strDescripcion']; ?>"
  onClick="doSomething()"
  ><?php echo $row_Recordset1['strDescripcion']; ?></a> </li> <!--<br>-->
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
<?php
mysql_free_result($Recordset1);
?>
</ul>
<!--</nav>-->