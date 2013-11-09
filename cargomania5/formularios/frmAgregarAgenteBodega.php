<script type="text/javascript">
function validar(){
	if(document.getElementById("cmdGuardar").value=="Guardar"){
		document.getElementById("agregarAgenteBodega").action="?mod=guardar_AgenteBodega";
	}else{
		document.getElementById("agregarAgenteBodega").action="?mod=actualizar_AgenteBodega";
	}
}</script>
<?php 
$objAgenteBodega=new CargoMania;
$codigo="";
$nomb_aget="";
$direccion_aget="";
$nombre_repre="";
$apellido_repre="";
$pais_aget="";

if(isset($_GET["id"])){
	$consultarAgenteBodega=$objAgenteBodega->mostrar_AgenteBodega($_GET["id"]);
	if($consultarAgenteBodega->rowCount()==1){
		$contene=$consultarAgenteBodega->fetch(PDO::FETCH_OBJ);
		$codigo=$contene->aget_bod_id;
		$nomb_aget=$contene->nombre_aget_bod;
		$direccion_aget=$contene->direccion_aget_bod;
		$nombre_repre=$contene->nombre_repre_aget_bod;
		$apellido_repre=$contene->apellido_repre_aget_bod;
		$pais_aget=$contene->pais_aget_bod;
		
	}
}

?>
<form name="agregarAgenteBodega" id="agregarAgenteBodega" method="post" onSubmit="return validar();">
<table>
	<caption><h1>AGREGAR AGENTE BODEGA</h1></caption>
	<tr>
		<th>Codigo:</th>
		<td><input type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $codigo ?>" /></td>
	</tr>
	<tr>
		<th>Nombre Empresa:</th>
		<td><input type="text" name="txtNomb_Aget" id="txtNomb_Aget" value="<?php echo $nomb_aget ?>" /></td>
	</tr>
	<tr>
		<th>Giro:</th>
		<td><input type="text" name="txtdireccion_aget" id="txtdireccion_aget" value="<?php echo $direccion_aget ?>" /></td>
	</tr>
	<tr>
		<th>Numero de Registro:</th>
		<td><input type="text" name="txtnombre_repre" id="txtnombre_repre"  value="<?php echo $nombre_repre ?>" /></td>
	</tr>

	<tr>
		<th>Direccion:</th>
		<td><input type="text" name="txtapellido_repre" id="txtapellido_repre"  value="<?php echo $apellido_repre?>" /></td>
	</tr>
	<tr>
		<th>Nombre Representante:</th>
		<td><input type="text" name="txtpais_aget" id="txtpais_aget"  value="<?php echo $pais_aget ?>" /></td>
	</tr>
	




	
	<tr>
		<td><input type="submit" name="cmdGuardar" value="<?php if(isset($_GET["id"])){echo "Actualizar";}else{echo "Guardar";}?>" id="cmdGuardar" /></td>
	</tr>
</table>
</form>
<table>
	<tr><th>Codigo</th><th>Nombre Agente</th><th>Direccion Agente</th><th>Nombre Representante</th><th>Apellido Representante</th><th>Pais de Agente</th><th>Opcion</th></tr>
<?php 
$consultarAgenteBodega=$objAgenteBodega->listar_agentebodega();
if($consultarAgenteBodega->rowCount()>0){
	while($agentebodega=$consultarAgenteBodega->fetch(PDO::FETCH_OBJ)){
		
		echo "<tr><td>".$agentebodega->aget_bod_id."</td><td>".$agentebodega->nombre_aget_bod."</td><td>".$agentebodega->direccion_aget_bod."</td>
		<td>".$agentebodega->nombre_repre_aget_bod."</td><td>".$agentebodega->apellido_repre_aget_bod."</td><td>".$agentebodega->pais_aget_bod."</td><td></td><td><a href='?mod=agregar_agentebodega&id=".$agentebodega->aget_bod_id."'>Mostrar</a></td></tr>";
	}
}
?>
</table>