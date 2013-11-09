<script type="text/javascript">
function validar(){
	if(document.getElementById("cmdGuardar").value=="Guardar"){
		document.getElementById("agregarTarifa").action="?mod=guardar_tarifa";
	}else{
		document.getElementById("agregarTarifa").action="?mod=actualizar_tarifa";
	}
}</script>
<?php 
$objTarifa=new CargoMania;
$codigo="";
$peso="";
$vol="";
$cliente="";


if(isset($_GET["id"])){
	$consultarTarifa=$objTarifa->mostrar_tarifa($_GET["id"]);
	if($consultarTarifa->rowCount()==1){
		$contene=$consultarTarifa->fetch(PDO::FETCH_OBJ);
		$codigo=$contene->cat_tarifa_id;
		$peso=$contene->cobro_peso;
		$vol=$contene->cobro_vol;
		$cliente=$contene->fk_cliente;
		
	}
}

?>
<form name="agregarTarifa" id="agregarTarifa" method="post" onSubmit="return validar();">
<table>
	<caption><h1>AGREGAR TARIFA</h1></caption>
	<tr>
		<th>Codigo:</th>
		<td><input type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $codigo ?>" /></td>
	</tr>
	<tr>
		<th>Cobro por Peso:</th>
		<td><input type="text" name="txtPeso" id="txtPeso" value="<?php echo $peso ?>" /></td>
	</tr>
	<tr>
		<th>Cobro por Volumen:</th>
		<td><input type="text" name="txtVol" id="txtVol" value="<?php echo $vol ?>" /></td>
	</tr>



	<tr>
		<th>Cliente:</th>
		<td><select name="lstCliente" id="lstCliente">
			<?php 
			$consultarCliente=$objTarifa->consultar_clientes();
			if($consultarCliente->rowCount()>0){
				echo "<option value='0'>Elija un Cliente</option>";
				while($cliente=$consultarCliente->fetch(PDO::FETCH_OBJ)){
			?>
			<?php if($cliente->cliente_id==$cliente && $cliente!=""){
				$selected=" selected";
			}else{
				$selected="";
			} ?>
					<option value="<?php echo $cliente->cliente_id ?>" <?php echo $selected; ?>><?php echo $cliente->nombre_empr ?></option>
			<?php
				}
			}else{
			?>
				<option value="0">No hay Clientes</option>
			<?php
			}
			?>
		</select></td>
	</tr>




	
	<tr>
		<td><input type="submit" name="cmdGuardar" value="<?php if(isset($_GET["id"])){echo "Actualizar";}else{echo "Guardar";}?>" id="cmdGuardar" /></td>
	</tr>
</table>
</form>
<table>
	<tr><th>Codigo</th><th>Cobro por Peso</th><th>Cobro por Volumen</th><th>Cliente</th><th>Modificar</th></tr>
<?php 
$consultarTarifa=$objTarifa->listar_tarifas();
if($consultarTarifa->rowCount()>0){
	while($tarifa=$consultarTarifa->fetch(PDO::FETCH_OBJ)){
		$cliente=$objTarifa->consultar_cliente($tarifa->fk_cliente)->fetch(PDO::FETCH_OBJ);
		echo "<tr><td>".$tarifa->cat_tarifa_id."</td><td>".$tarifa->cobro_peso."</td><td>".$tarifa->cobro_vol."</td>
		<td>".$cliente->nombre_empr."</td><td><a href='?mod=agregar_tarifa&id=".$tarifa->cat_tarifa_id."'>Mostrar</a></td></tr>";
	}
}
?>
</table>