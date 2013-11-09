<body>
<div class="container">
  <table width="100%" border="0">
  <tr>
    <td width="100%" height="100%" align="center">
    <script type="text/javascript" src="lib/alertify.js"></script>
<link rel="stylesheet" href="themes/alertify.core.css" />
<link rel="stylesheet" href="themes/alertify.default.css" />
<script src="lib/eventos.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<style type="text/css">
p{
  text-align: left;
}
#login{
  padding-left: 200px;
}
#error{
  color:red;
  border-radius: 10px;
  border-color: black;
  border-width: 5px;
  text-align: left;
}
</style>
    <script>
    $(document).ready(function(){         
      $("#submit").click(function(){
        var formulario = $("#frmLogin").serializeArray();
        $.ajax({
          type: "POST",
          dataType: 'json',
            url: "procesos/autenticar.php",
            data: formulario,
        }).done(function(respuesta){
          //$("#mensaje").html(respuesta.mensaje);
          //alert(respuesta.mensaje);
          if(respuesta.mensaje==1){
            error("Por favor llene todos los campos");
          }else if(respuesta.mensaje==2){
            error("Combinacion de usuario y contraseña incorrecta");
          }else if(respuesta.mensaje==3){
            ok("Datos correctos");
            location.href="?mod=menu";
          }else if(respuesta.mensaje==4){
            ok("Datos correctos");
            location.href="?mod=menu1";
          }else if(respuesta.mensaje==5){
            ok("Datos correctos");
            location.href="?mod=menu2";
          }
        });
      });
    });
    </script>
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<div id="box" style="background-color:white;background-image:url(images/avatar.gif);background-repeat:no-repeat;background-position:center top;">
<div class="elements">
<div class="avatar"></div>
<form id="frmLogin">
<input type="text" name="username" class="username" placeholder="Usuario" />
<input type="password" name="password" class="password" placeholder="•••••••••" />
<div class="forget"><a href="formularios/validacion.php">¿Olvid&oacute; su contrase&ntilde;a?</a></div>
<!--<div class="checkbox">
<input id="check" name="checkbox" type="checkbox" value="1" />
<label for="check">Remember?</label>
</div>
<div class="remember">Remember?</div>-->
<input type="button" name="submit" class="submit" id="submit" value="Ingresar" />
</form>
</div>
<br>
<div id='error'><?php 
if(isset($_GET['msj'])){
  $msj=$_GET['msj'];
  if($msj==1){
    echo "Llene todos los campos";
  }else if($msj==2){
    echo "Combinaci&oacute;n de usuario y contrase&ntilde;a incorrecta";
  }
}
?></div>
</div>
    </td>
    <td width="467">
    <iframe frameBorder="0"  width="100%"  height="100%" name="iframe2"></iframe>
    </td>
  </tr>
</table>