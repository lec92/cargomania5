<?php
date_default_timezone_set('America/Chicago'); 
ob_start();
session_start();
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cargomania</title>
<link  href="css/style4.css" rel="stylesheet"  type="text/css" />


<script src="js/jquery-1.8.2.js"></script>
<!--<script src="js/jquery-1.8.2.js"></script>-->


<script type="text/javascript">
function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 
posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=yes,resizable=yes,left="+posicion_x+",top="+posicion_y+"");
}
</script> 








</head>
<body>
<div id="header-wrap">
	<div id="header-`container">
		<div id="header-`container">
        <div id="header">
            <?php include("header2.php") ?>
        </div>
	</div>
</div>
<div style="background-color:#FFF;height:768px;">
    <div id="ie6-container-wrap">
        <div id="container">
            <div id="content" align="center">
            <?php 
                include(MODULO_PATH . "/" . $conf[$modulo]['archivo']);
            ?>  
        </div>
      </div>
    </div>
</div>
<div id="footer-wrap">
    <div id="footer-container">
        
    </div>
 </div>
</body>
</html>
<?php
ob_end_flush();
?>