<?php 
include("header.php");
extract($_POST);//con esta función se extrae todo lo que viene desde el formulario y crea una variable por campo
$objGuardar=new CargoMania;
$respuesta = new stdClass();
//Observen que en lugar de poner $_POST["txtCodigo"] solo se pone $txtCodigo, esto lo hace extract($_POST); con cada elemento
//Del formulario, para evitar estar poniendo $_POST cada vez
print_r($_POST);//Imprime el arreglo $_POST
$campos=array($txtCodigo,$txtTamano,$txtNumero,$txtSello,$lstAgente);
/*echo "<br />";
print_r($campos);*/
$vacios=false;
for($i=0;$i<count($campos);$i++){
	if($cuenta[$i]==""){
		$vacios=true;
	}
}
if($vacios==true){
	$respuesta->mensaje=3;
}else{
	if($guardarCont=$objGuardar->guardar_contenedor($campos)){
		$respuesta->mensaje=1;
	}else{
		$respuesta->mensaje=2;
	}
}
?>