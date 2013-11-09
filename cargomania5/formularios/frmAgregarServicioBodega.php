<script type="text/javascript">
function validar(){
	if(document.getElementById("cmdGuardar").value=="Guardar"){
		document.getElementById("agregarServiciobodega").action="?mod=guardar_serviciobodega";
	}else{
		document.getElementById("agregarServiciobodega").action="?mod=actualizar_ServicioBodega";
	}
}</script>
<?php 
$objServiciobodega=new CargoMania;
$codigo="";
$nomb_serv="";
$precio_serv="";
$agente="";


if(isset($_GET["id"])){
	$consultarServiciobodega=$objServiciobodega->mostrar_serviciobodega($_GET["id"]);
	if($consultarServiciobodega->rowCount()==1){
		$contene=$consultarServiciobodega->fetch(PDO::FETCH_OBJ);
		$codigo=$contene->serv_bod_id;
		$nomb_serv=$contene->nombre_serv_bod;
		$precio_serv=$contene->precio_serv_bod;
		$agente=$contene->fk_agente_bod;
		
	}
}

?>
<form name="agregarServiciobodega" id="agregarServiciobodega" method="post" onSubmit="return validar();">
<table>
	<caption><h1>AGREGAR SERVICIOBODEGA</h1></caption>
	<tr>
		<th>Codigo:</th>
		<td><input type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $codigo ?>" /></td>
	</tr>
	<tr>
		<th>Nombre del servicio:</th>
		<td><input type="text" name="txtnomb_serv" id="txtnomb_serv" value="<?php echo $nomb_serv ?>" /></td>
	</tr>
	<tr>
		<th>Precio del servicio:</th>
		<td><input type="text" name="txtprecio_serv" id="txtprecio_serv" value="<?php echo $precio_serv ?>" /></td>
	</tr>
	
	<tr>
		<th>Agente:</th>
		<td><select name="lstAgente" id="lstAgente">
			<?php 
			$consultarAgente=$objServiciobodega->consultar_agentes();
			if($consultarAgente->rowCount()>0){
				echo "<option value='0'>Elija un agente</option>";
				while($agente=$consultarAgente->fetch(PDO::FETCH_OBJ)){
			?>
			<?php if($agente->aget_bod_id==$agente && $agente!=""){
				$selected=" selected";
			}else{
				$selected="";
			} ?>
					<option value="<?php echo $agente->aget_bod_id ?>" <?php echo $selected; ?>><?php echo $agente->nombre_aget_bod ?></option>
			<?php
				}
			}else{
			?>
				<option value="0">No hay agentes</option>
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
	<tr><th>Codigo</th><th>nombre servicio</th><th>Precio</th><th>Agente</th><th>Opcion</th></tr>
<?php 
$consultarServiciobodega=$objServiciobodega->listar_serviciobodega();
if($consultarServiciobodega->rowCount()>0){
	while($Serviciobodega=$consultarServiciobodega->fetch(PDO::FETCH_OBJ)){
		$agente=$objServiciobodega->consultar_agente($Serviciobodega->fk_agente_bod)->fetch(PDO::FETCH_OBJ);
		echo "<tr><td>".$Serviciobodega->serv_bod_id."</td><td>".$Serviciobodega->nombre_serv_bod."</td><td>".$Serviciobodega->precio_serv_bod."</td><td>".$agente->nombre_aget_bod.
		"</td><td><a href='?mod=agregar_serviciobodega&id=".$Serviciobodega->serv_bod_id."'>Mostrar</a></td></tr>";
	}
}
?>
</table>