<?php 
extract($_POST);//con esta función se extrae todo lo que viene desde el formulario y crea una variable por campo
$objGuardar=new CargoMania;
//Observen que en lugar de poner $_POST["txtCodigo"] solo se pone $txtCodigo, esto lo hace extract($_POST); con cada elemento
//Del formulario, para evitar estar poniendo $_POST cada vez
print_r($_POST);//Imprime el arreglo $_POST
$campos=array($txtCodigo,$txtNombre,$txtDireccion,$ltsTipo,$txtPais);
/*echo "<br />";
print_r($campos);*/
if($guardarAdu=$objGuardar->guardar_aduana_llegada($campos)){
	echo "Aduana guardada";

	header("location:?mod=agregar_aduana_llegada");
}
?>