<?php 
extract($_POST);//con esta función se extrae todo lo que viene desde el formulario y crea una variable por campo
$objGuardar=new CargoMania;
//Observen que en lugar de poner $_POST["txtCodigo"] solo se pone $txtCodigo, esto lo hace extract($_POST); con cada elemento
//Del formulario, para evitar estar poniendo $_POST cada vez
//print_r($_POST);//Imprime el arreglo $_POST
$campos=array($txtCodigo,$txtNombre,$txtTipo,$txtDescripcion);
/*echo "<br />";
print_r($campos);*/
if($guardarMercaderia=$objGuardar->actualizar_mercaderia($campos)){
	echo "Mercaderia actualizada";

	header("location:?mod=agregar_mercaderia");
}
?>