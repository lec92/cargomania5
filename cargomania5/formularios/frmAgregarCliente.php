<script type="text/javascript">
function validar(){
	if(document.getElementById("cmdGuardar").value=="Guardar"){
		document.getElementById("agregarCliente").action="?mod=guardar_cliente";
	}else{
		document.getElementById("agregarCliente").action="?mod=actualizar_cliente";
	}
}</script>
<?php 
$objCliente=new CargoMania;
$codigo="";
$nomb_empr="";
$giro="";
$numero_reg="";
$direccion="";
$nombre_repre="";
$apellido_repre="";
$telefono_repre="";
$email_repre="";

if(isset($_GET["id"])){
	$consultarCliente=$objCliente->mostrar_cliente($_GET["id"]);
	if($consultarCliente->rowCount()==1){
		$contene=$consultarCliente->fetch(PDO::FETCH_OBJ);
		$codigo=$contene->cliente_id;
		$nomb_empr=$contene->nombre_empr;
		$giro=$contene->giro;
		$numero_reg=$contene->num_reg;
		$direccion=$contene->direccion;
		$nombre_repre=$contene->nom_represent;
		$apellido_repre=$contene->apellido_represent;
		$telefono_repre=$contene->telefono_represent;
		$email_repre=$contene->correo;
	}
}

?>
<form name="agregarCliente" id="agregarCliente" method="post" onSubmit="return validar();">
<table>
	<caption><h1>AGREGAR CLIENTE</h1></caption>
	<tr>
		<th>Codigo:</th>
		<td><input type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $codigo ?>" /></td>
	</tr>
	<tr>
		<th>Nombre Empresa:</th>
		<td><input type="text" name="txtEmpresa" id="txtEmpresa" value="<?php echo $nomb_empr ?>" /></td>
	</tr>
	<tr>
		<th>Giro:</th>
		<td><input type="text" name="txtGiro" id="txtGiro" value="<?php echo $giro ?>" /></td>
	</tr>
	<tr>
		<th>Numero de Registro:</th>
		<td><input type="text" name="txtRegistro" id="txtRegistro"  value="<?php echo $numero_reg ?>" /></td>
	</tr>

	<tr>
		<th>Direccion:</th>
		<td><input type="text" name="txtDireccion" id="txtDireccion"  value="<?php echo $direccion ?>" /></td>
	</tr>
	<tr>
		<th>Nombre Representante:</th>
		<td><input type="text" name="txtNom_repre" id="txtNom_repre"  value="<?php echo $nombre_repre ?>" /></td>
	</tr>
	<tr>
		<th>Apellido Representante:</th>
		<td><input type="text" name="txtApell_repre" id="txtApell_repre"  value="<?php echo $apellido_repre ?>" /></td>
	</tr>
	<tr>
		<th>Telefono Representante:</th>
		<td><input type="text" name="txtTel_repre" id="txtTel_repre"  value="<?php echo $telefono_repre ?>" /></td>
	</tr>

	<tr>
		<th>Email Representante:</th>
		<td><input type="text" name="txtEmail_repre" id="txtEmail_repre"  value="<?php echo $email_repre ?>" /></td>
	</tr>





	
	<tr>
		<td><input type="submit" name="cmdGuardar" value="<?php if(isset($_GET["id"])){echo "Actualizar";}else{echo "Guardar";}?>" id="cmdGuardar" /></td>
	</tr>
</table>
</form>
<table>
	<tr><th>Codigo</th><th>Tama&ntilde;o</th><th>Numero</th><th>Sello</th><th>Agente</th><th>Opcion</th></tr>
<?php 
$consultarCliente=$objCliente->listar_cliente();
if($consultarCliente->rowCount()>0){
	while($cliente=$consultarCliente->fetch(PDO::FETCH_OBJ)){
		
		echo "<tr><td>".$cliente->cliente_id."</td><td>".$cliente->nombre_empr."</td><td>".$cliente->giro."</td>
		<td>".$cliente->num_reg."</td><td>".$cliente->direccion."</td><td>".$cliente->nom_represent."</td><td>".$cliente->apellido_represent."</td><td>".$cliente->telefono_represent."</td><td>".$cliente->correo."</td><td><a href='?mod=agregar_cliente&id=".$cliente->cliente_id."'>Mostrar</a></td></tr>";
	}
}
?>
</table>