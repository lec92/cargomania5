<?php
include("header.php");
session_start();
$user=$_POST["username"];
$pwd=$_POST["password"];
$respuesta = new stdClass();
if($user=="" || $user==null || trim($user)=="" || $pwd=="" || $pwd==null || trim($pwd)==""){
    $respuesta->mensaje = 1;
    //echo "Combinaci&oacute;n de usuario y contrase&ntilde;a incorrecta";
    //header("Location:?mod=login&msj=1");
}else{
    $objUser=new CargoMania;
    $log=array($user,$pwd);
    $consultarUsuario=$objUser->consultar_usuario($log);
    $c=$consultarUsuario->rowCount();
    //$conuser=pg_query("select * from usuario where Usuario='".$user."' and Contrasena='".$pwd."'");

    //if(pg_num_rows($conuser)==1){ //Verificando que exista ese usuario y este activo
    if($c==1){ //Verificando que exista ese usuario y este activo
        $usuario=$consultarUsuario->fetch(PDO::FETCH_OBJ);
        //$usuario=pg_fetch_assoc($conuser);
        $_SESSION["autenticado"]="si";
        //$_SESSION["tipo"]=$usuario["tipousuario"];
        $_SESSION["tipo"]=$usuario->tipousuario;
        //$_SESSION["nombre"]=$usuario["usuario"];
        $_SESSION["nombre"]=$usuario->correo;
        //echo "Usuario encontrado";
        //$_SESSION["tipo"]=$usuario->TipoUsuario;
        //$row=pg_fetch_array($conuser);
        if($usuario->tipousuario=="Administrador"){
            $respuesta->mensaje = 3;    
        }else if($usuario->tipousuario=="Empleado"){
            $respuesta->mensaje = 4;
        }else{
            $respuesta->mensaje = 5;
        }
    }else{ //Si los datos ingresados son incorrectos mostrara el mensaje de alerta
        $respuesta->mensaje = 2;
        //header("Location:?mod=login&msj=2");
    }
}
unset($objUser);
echo json_encode($respuesta);
?>