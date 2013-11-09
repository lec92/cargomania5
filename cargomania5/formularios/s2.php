

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multisport</title>
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




<style type="text/css">





div.send {
position: relative;
width: 115px;
height: 34px;
overflow:hidden;
background:url(../../images/enviar.png) left top no-repeat;
clip:rect(0px, 80px, 24px, 0px );
}




div.send input {
position: absolute;
left: auto;
right: 0px;
top: 0px;
margin:0;
padding:0;
filter: Alpha(Opacity=0);
-moz-opacity: 0;
opacity: 0;
}

</style>



<script type="text/javascript">
function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 
posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script> 




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
<div class="container">
<div  style="background-color:#044E7C "class="header"><!-- end .header -->
  <table width="1013" border="0">
      <tr>
        <td width="1007" height="21"><form name="form1" method="post" action="">
          <p>
            <label for="textfield"></label>
          </p>
      
        </form></td>
      </tr>
  </table>
</div>
  </div>


<div style="background-color:#000"><h1 align="center"><font color="#F2F2F2">Pregunta secreta</font></h1>
</div>
     
      <table align="center" width="350" height="30" border="0">
        <tr>
          <td>
          
          
     <?php 
if (isset($_GET['errorusuario'])){  
if ($_GET['errorusuario']==1){
echo "<center><span class='style9'>Respuesta incorrecta</span></center>";}
else{
echo "";
}}
?>     
    
          
          
          </td>
        </tr>
</table>
     
     
     
     
     
     <?php
include("../conexion.php");

$correo=$_POST['txt_correo'];



$result=pg_query("SELECT * FROM usuario where correo='$correo'");
$filas=pg_numrows($result);



if($filas==0){

header("Location:validacion.php?errorusuario=1");

}

else{



$resultado=pg_query("SELECT pregunta FROM usuario where correo='$correo'");


$row = pg_fetch_array($resultado);
$pregunta = $row['pregunta'];
echo "<center><b>$pregunta</b></center>";
?>


 <form name="formulario" method="post" action="s3.php" >
<table align="center">

 <center><input name="txt_correo" type="text" size="50" value="<?php echo $correo ?>"/></center>

<tr>
    <td align="right">Respuesta:</td>
    <td>
    
   
    
    <input type="text" name="txt_respuesta" id="txt_respuesta">
     <a href="javascript:popup('s3.php',800,780)"><input style="height:60px; width:100px; font-size:20px" type="submit" name="Submit" value="Enviar" /></td></b></font><br/>
    
    
  </tr>
  <tr>
    <td colspan="2" align="center">
    
       <div align="center" class="send">
				 
                 </div>
    </td>
    </tr>

</table>

    
   


</form>      







<?php
}
?>

    
    

 
    
    
    
    
    
    
</body>
</html>
