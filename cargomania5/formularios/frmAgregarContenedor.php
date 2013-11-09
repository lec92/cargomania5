<script type="text/javascript">
function validar(){
	if(document.getElementById("cmdGuardar").value=="Guardar"){
		document.getElementById("agregarContenedor").action="?mod=guardar_contenedor";
	}else{
		document.getElementById("agregarContenedor").action="?mod=actualizar_contenedor";
	}
}</script>
<?php 
$objContenedor=new CargoMania;
$codigo="";
$tamano="";
$sello="";
$numero="";
$agente="";
if(isset($_GET["id"])){
	$consultarContenedor=$objContenedor->mostrar_contenedor($_GET["id"]);
	if($consultarContenedor->rowCount()==1){
		$contene=$consultarContenedor->fetch(PDO::FETCH_OBJ);
		$codigo=$contene->contene_id;
		$tamano=$contene->tamano_conte;
		$numero=$contene->numero_conte;
		$sello=$contene->sello_conte;
		$agente=$contene->fk_agent_bod;
	}
}

?>
<form name="agregarContenedor" id="agregarContenedor" method="post" onSubmit="return validar();">
<table>
	<caption><h1>AGREGAR UN NUEVO CONTENEDOR</h1></caption>
	<tr>
		<th>Codigo:</th>
		<td><input type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $codigo ?>" /></td>
	</tr>
	<tr>
		<th>Tamaño contenedor:</th>
		<td><input type="text" name="txtTamano" id="txtTamano" value="<?php echo $tamano ?>" /></td>
	</tr>
	<tr>
		<th>Numero:</th>
		<td><input type="text" name="txtNumero" id="txtNumero" value="<?php echo $numero ?>" /></td>
	</tr>
	<tr>
		<th>Sello:</th>
		<td><input type="text" name="txtSello" id="txtSello"  value="<?php echo $sello ?>" /></td>
	</tr>
	<tr>
		<th>Agente:</th>
		<td><select name="lstAgente" id="lstAgente">
			<?php 
			$consultarAgente=$objContenedor->consultar_agentes();
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
	<tr><th>Codigo</th><th>Tama&ntilde;o</th><th>Numero</th><th>Sello</th><th>Agente</th><th>Opcion</th></tr>
<?php 
$consultarContenedores=$objContenedor->listar_contenedores();
if($consultarContenedores->rowCount()>0){
	while($contenedor=$consultarContenedores->fetch(PDO::FETCH_OBJ)){
		$agente=$objContenedor->consultar_agente($contenedor->fk_agent_bod)->fetch(PDO::FETCH_OBJ);
		echo "<tr><td>".$contenedor->contene_id."</td><td>".$contenedor->tamano_conte."</td><td>".$contenedor->numero_conte."</td>
		<td>".$contenedor->sello_conte."</td><td>".$agente->nombre_aget_bod."</td><td><a href='?mod=agregar_contenedor&id=".$contenedor->contene_id."'>Mostrar</a></td></tr>";
	}
}
?>
</table>