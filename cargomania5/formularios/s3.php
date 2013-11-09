

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cargomania</title>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../../slideshow/design_slideshow.css" rel="stylesheet" type="text/css" />
<link href="../../slideshow/ulightbox.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="StyleSheet" href="../../slideshow/layer6.css">
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript" src="../../slideshow/jquery-1_002.js"></script>
<script type="text/javascript" src="../../slideshow/parametros_slideshow.js"></script>
<script>var div = document.getElementsByTagName('div')[0]; div.innerHTML = '';</script>
<script type="text/javascript" src="../../slideshow/jquery-1.js"></script>
<script type="text/javascript" src="../../slideshow/ulightbox.js"></script>
<script type="text/javascript" src="../../slideshow/uwnd.js"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../../slideshow/design_slideshow.css" rel="stylesheet" type="text/css" />
<link href="../../slideshow/ulightbox.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="StyleSheet" href="../../slideshow/layer6.css">
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript" src="../../slideshow/jquery-1_002.js"></script>
<script type="text/javascript" src="../../slideshow/parametros_slideshow.js"></script>
<script>var div = document.getElementsByTagName('div')[0]; div.innerHTML = '';</script>
<script type="text/javascript" src="../../slideshow/jquery-1.js"></script>
<script type="text/javascript" src="../../slideshow/ulightbox.js"></script>
<script type="text/javascript" src="../../slideshow/uwnd.js"></script>
<link href="../../panel/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
.UhideBlock {
	display: none
}

</style>
</head>
<body>
<div  style="background-color:#222 "class="header"><!-- end .header -->
    <table width="944" border="0">
      <tr>
        <td width="553" height="72"><img src="../imagenes/Logo.png" width="213" height="70"></td>
        <td width="381"><form name="form1" method="post" action="">
        </form></td>
      </tr>
    </table>
</div>
<div  style="background-color:#044E7C "class="header"><!-- end .header -->
  <table width="1013" border="0">
      <tr>
        <td width="754" height="21"><form name="form1" method="post" action="">
          <p>
            <label for="textfield"></label>
          </p>
      
        </form></td>
        <td width="108">&nbsp;</td>
        <td width="137"><span class="header" style="background-color:#044E7C "><a href="../index.php"><img src="../imagenes/register.png" width="16" height="16" />login</a></span></td>
      </tr>
  </table>
</div>
<div style="background-color:#000"><h1 align="center"><font color="#F2F2F2">Contraseña</font></h1>
</div>
     
     
     
     
     
   <?php
include "../conexion.php";

$respuesta=$_POST['txt_respuesta'];

$correo=$_POST['txt_correo'];

$result=pg_query("SELECT * FROM usuario WHERE respuesta='$respuesta' AND correo='$correo'");
$filas=pg_numrows($result);


if($filas==0){

header("Location:validacion.php?errorusuario=1");

}

else{


$resultado=pg_query("SELECT contrasena FROM usuario where respuesta='$respuesta' AND correo='$correo'");


$row = pg_fetch_array($resultado);
$clave = $row['contrasena'];
echo "<center><b>$clave</b></center>";


}

?>
    
    
    
    
    
</body>
</html>
