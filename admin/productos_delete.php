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
 echo "Eliminar";
 echo $_GET['rec'];
if ((isset($_GET['rec'])) && ($_GET['rec'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tblproducto WHERE idProducto=%s",
                       $_GET['rec'], "int");

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($deleteSQL, $connect) or die(mysql_error());
  echo "Eliminar";
  echo $_GET['recordID'];
  header("Location: productos_lista.php");
 /* $deleteGoTo = "productos_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header("Location: productos_lista.php");*/
}
?>