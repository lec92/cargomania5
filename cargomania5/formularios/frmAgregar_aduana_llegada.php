<script type="text/javascript">
function validar(){
	if(document.getElementById("cmdGuardar").value=="Guardar"){
		document.getElementById("agregar_aduana_llegada").action="?mod=guardar_aduana_llegada";
	}else{
		document.getElementById("agregar_aduana_llegada").action="?mod=actualizar_aduana_llegada";
	}
}</script>
<?php 
$objAduana_llegada=new CargoMania;
$codigo="";
$nombre="";
$direccion="";
$tipo="";
$pais="";
if(isset($_GET["id"])){
	$consultarAduana_llegada=$objAduana_llegada->mostrar_aduana_llegada($_GET["id"]);
	if($consultarAduana_llegada->rowCount()==1){
		$contene=$consultarAduana_llegada->fetch(PDO::FETCH_OBJ);
		$codigo=$contene->adu_llega_id;
		$nombre=$contene->nombre_adu_llega;
		$direccion=$contene->direccion_adu_llega;
		$tipo=$contene->tipo_adu_llega;
		$pais=$contene->pais_adu_llega;
	}
}

?>
<form name="agregar_aduana_llegada" id="agregar_aduana_llegada" method="post" onSubmit="return validar();">
<table>
	<caption><h1>AGREGAR NUEVA ADUANA </h1></caption>
	<tr>
		<th>Codigo:</th>
		<td><input type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $codigo ?>" /></td>
	</tr>
	<tr>
		<th>Nombre:</th>
		<td><input type="text" name="txtNombre" id="txtNombre" value="<?php echo $nombre ?>" /></td>
	</tr>
	<tr>
		<th>Direccion:</th>
		<td><input type="text" name="txtDireccion" id="txtDireccion" value="<?php echo $direccion ?>" /></td>
	</tr>

	<tr>
		<th>Tipo</th>
		<td><select name="ltsTipo"  id="ltsTipo">
		<option value="Maritimo">Maritimo</option>
		<option value="Aereo">Aereo</option>
		<option value="Terrestre">Terrestre</option>


	</select></td>


	</tr>

	



	<tr>
		<th>Pais:</th>
		<td><input type="text" name="txtPais" id="txtPais"  value="<?php echo $pais ?>" /></td>
	</tr>
	
	<tr>
		<td><input type="submit" name="cmdGuardar" value="<?php if(isset($_GET["id"])){echo "Actualizar";}else{echo "Guardar";}?>" id="cmdGuardar" /></td>
	</tr>
</table>
</form>
<table>
	<tr><th>Codigo</th><th>Nombre</th><th>Direccion</th><th>Tipo</th><th>Pais</th><th>Opcion</th></tr>
<?php 
$consultarAduanas_llegada=$objAduana_llegada->listar_aduana_llegada();
if($consultarAduanas_llegada->rowCount()>0){
	while($aduana=$consultarAduanas_llegada->fetch(PDO::FETCH_OBJ)){
		
		echo "<tr><td>".$aduana->adu_llega_id."</td><td>".$aduana->nombre_adu_llega."</td><td>".$aduana->direccion_adu_llega."</td>
		<td>".$aduana->tipo_adu_llega."</td><td>".$aduana->pais_adu_llega."</td><td><a href='?mod=agregar_aduana_llegada&id=".$aduana->adu_llega_id."'>Mostrar</a></td></tr>";
	}
}
?>
</table>