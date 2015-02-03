<!--<html>
<head>-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<link rel="stylesheet" href="tmp/2col_leftNav.css" type="text/css" />

<!--<title>Problema</title>-->
<style type="text/css"> 
html{
	background: url(slr.jpg) no-repeat center center fixed;
	-webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
.buttons {
	width:200px;
	margin:60%;
	display = inline-block;
}<!--CAMBIO-->

.boton {
	float:left;
	margin-right:10px;
	margin-top:20px;
	width:130px;
	height:30px;
	background: #73C2FB;
	color:#fff;
	padding:13px 6px 0 6px;
	cursor:pointer;
	text-align:center;

    
}
<!--.boton {
	float:left;
	/*margin-right:10px;*/
	margin-top:20px;
	width:130px;
	height:25px;
	background: #73C2FB;
	color:#fff;
	padding:10px 6px 0 6px;
	cursor:pointer;
	text-align:center;-->

    
}

.boton:hover{color:#01DF01}

.loginform{

		display:none; 	display:none;      <!-- -------------------------> <!--es importante ocultar las ventanas previamente -->
	font-family:Arial, Helvetica, sans-serif;
	width:30%;
	line-height:28px;
	margin-right:50%;
	<!--background: #73C2FB;-->
}
.campo{

	width:30%;
	margin-top:10%;
	margin-right:10%;
	background: #73C2FB;
}
.textarea{float:left}
.but{background: #73C2FB;
	color:#fff}
#but:hover{color:#01DF01}
</style>
<script type="text/javascript">

function mostrar(){
document.getElementById('loginform').style.display = 'block';
//document.getElementById('loginform').style.background = '#73C2FB';
document.getElementById('loginform').style.background = '#ffff';
document.getElementById('loginform').style.margin = '15%'}
function ocultar(){
document.getElementById('loginform').style.display = 'none';}

</script>
<!--</head>
<body>-->
<div id="sectionLinks">
<?php //include("includes/catalogo.php"); ?>
</div>
	<div id="buttons">
	<div id="b1" class="boton" value="Mostrar" onclick="mostrar()">Log-In</div>
		<div id="b2" class="boton" value="Mostrar" onclick="mostrar()">Registrar</div>
		<div id="b3" class="boton" value="Mostrar" onclick="mostrar()">Contactar</div>
	</div>
	

<form id="loginform" action="user/login.php" method="post" style='display:none;'>

<div id="lab"><label><!--Nombre:--></label><div>
<div id="campo"><input type="text" id="usario" name="campousuario" required ><br></div>
<div id="lab"><label>Password:</label></div>
<div id="campo"><input type="password"  name="campoclave" required><br></div>
<input class="but" type="submit" value="entrar">
<input class="but" type="button" value="cerrar" onclick="ocultar()"> 

</form>


<!--</div>-->
<!--</body>
</html> -->