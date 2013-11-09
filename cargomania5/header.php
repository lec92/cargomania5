<link rel="shortcut icon" href="img/favicon.png">
<script type="text/javascript" src="lib/alertify.js"></script>
<link rel="stylesheet" href="themes/alertify.core.css" />
<link rel="stylesheet" href="themes/alertify.default.css" />
<script src="lib/eventos.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<table width="100%">
                <tr>
                    <td><img style='float:left;' src='imagenes/Logo.png' height='40px' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><div id="nombre"></div></td>
<td>
<link href="front.css" media="screen, projection" rel="stylesheet" type="text/css">
<?php
if(isset($_SESSION['autenticado'])){
  if($_SESSION['autenticado']=='si'){ ?>
  <td>
    <a href='?mod=logout' style='float:right;padding-left:12px;'><img src='img/logout.png' width='32' title='Cerrar Sesi&oacute;n' border='1' /></a>
    <a href='?mod=changePwd' style='float:right;padding-left:12px;'><img src='img/pwd.png' width='32' title='Cambiar contrase&ntilde;a' border='1' /></a>
    <a href='?mod=infouser'  style='float:right;padding-left:12px;'><img src='img/user_info.png' width='32' title='Informací&oacute;n del usuario' border='1' />
      <a href="?mod=home"><img src='img/home.png' width="32" title='Ir al inicio' style="float:right;padding-bottom:10px;"></a>
  </td>
<?php
  }
}else{
?>
<script src="javascripts/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $(".signin").mouseover(function(e) {          
          e.preventDefault();
          $("fieldset#signin_menu").toggle();
          $(".signin").toggleClass("menu-open");
      });
      $("fieldset#signin_menu").mouseup(function() {
        return false
      });
      $(".ocultar").onblur(function(e) {
        //alert("Fuera de container2");
        if($(e.target).parent("a.signin").length==0) {
          $(".signin").removeClass("menu-open");
          $("fieldset#signin_menu").hide();
        }
     });
      /*$('#midiv').click(function(event){
         event.stopPropagation();
     });*/
      /*$(document).click(function(e) {
        if($(e.target).parent("a.signin").length==0) {
          $(".signin").removeClass("menu-open");
          
          $("fieldset#signin_menu").hide();
        }
    });*/
  });
</script>
<script src="javascripts/jquery.tipsy.js" type="text/javascript"></script>
<script type='text/javascript'>
    $(function() {
    $('#forgot_username_link').tipsy({gravity: 'w'});   
    });
  </script>
<?php
}
?>
</td>
</tr>
</table>
<?php 
if(isset($_GET["mod"])){
  if($_GET["mod"]=="bandejaentrada"){
?>
<table width='100%'>
  <tr>
    <th width="50%">Asunto</th>
    <th width="11.35%">Fecha</th>
    <th width="48.65">Juzgado</th>
  </tr>
</table>
<?php   
  }else if($_GET["mod"]=="correoEnviado"){
?>
<table width='100%' id='tcontainer'>
  <tr>
    <th width="40%" rowspan="2">Asunto</th>
    <th width="11.35%" rowspan="2">Fecha</th>
    <th colspan="3">Estado</th>
  </tr>
  <tr>
    <th width='16.217%'>Le&iacute;do</th>
    <th width='16.217%'>Tiempo</th>
    <th width='16.217%'>Recibido</th>
  </tr>
</table>
<?php
  }
}
?>