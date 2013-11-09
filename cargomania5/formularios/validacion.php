

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



<style type="text/css">
<!--
.style8 {color: #666666; font-size: 14px; }
.style9 {color:#FF0000; font-size: 14px; }

.style1 {color: #606060}
-->
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





</head>
<body>
<div style="background-color:#000"><h1 align="center"><font color="#F2F2F2">Ingresa tu correo</font></h1>
</div>
     
     
      
     <table align="center" width="350" height="30" border="0">
        <tr>
          <td>
          
           <?php 
if (isset($_GET['errorusuario'])){
if ($_GET['errorusuario']==1){
echo "<center><span class='style9'>Correo invalido o inexistente</span></center>";}
else{
echo "";
}}
?>     
          
          
          </td>
        </tr>
</table>
<form name="formulario" method="post" action="s2.php" >
  <table align="center">
<tr>
    <td align="right">Correo:</td>
    <td><input type="text" name="txt_correo" id="txt_correo"> <input style="height:60px; width:100px; font-size:20px; left: 15px; right: 0px; top: 0px;" type="submit" name="Submit" value="Enviar" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    
     <div align="center" class="send">
				 <input style="height:60px; width:100px; font-size:20px; left: 15px; right: 0px; top: 0px;" type="submit" name="Submit" value="Enviar"></input>
                 </div>
    
    
  </td>
    </tr>

</table>

</form>       
    
    
    
    
    
    
</body>
</html>
