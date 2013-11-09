<script type="text/javascript">
function validar(){
	if(document.getElementById("cmdGuardar").value=="Guardar"){
		document.getElementById("agregarEmpleado").action="?mod=guardar_empleado";
	}else{
		document.getElementById("agregarEmpleado").action="?mod=actualizar_empleado";
	}
}</script>
<?php 
$objEmpleado=new CargoMania;
$codigo="";
$nombre_epll="";  
$apellido_epll="";
$direccion_epll="";
$telefono_epll="";
$correo_epll="";
$num_seguroo="";
$fk_sucursall="";


if(isset($_GET["id"])){
	$consultarEmpleado=$objEmpleado->mostrar_empleado($_GET["id"]);
	if($consultarEmpleado->rowCount()==1){
		$emp=$consultarEmpleado->fetch(PDO::FETCH_OBJ);
		$codigo=$emp->empleado_id;
		$nombre_epll=$emp->nombre_epl;
		$apellido_epll=$emp->apellido_epl;
		$direccion_epll=$emp->direccion_epl;
		$telefono_epll=$emp->telefono_epl;
		$correo_epll=$emp->correo_epl;
		$num_seguroo=$emp->num_seguro;
		$fk_sucursall=$emp->fk_sucursal;
		
	}
}

?>
<form name="agregarEmpleado" id="agregarEmpleado" method="post" onSubmit="return validar();">
<table>
	<caption><h1>AGREGAR EMPLEADO</h1></caption>
	<tr>
		<th>Codigo:</th>
		<td><input type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $codigo ?>" /></td>
	</tr>
	<tr>
		<th>Nombre Empleado:</th>
		<td><input type="text" name="txtNombre" id="txtNombre" value="<?php echo $nombre_epll ?>" /></td>
	</tr>
	<tr>
		<th>Apellido Empleado:</th>
		<td><input type="text" name="txtApellido" id="txtApellido" value="<?php echo $apellido_epll ?>" /></td>
	</tr>
	<tr>
		<th>Direccion:</th>
		<td><input type="text" name="txtDireccion" id="txtDireccion"  value="<?php echo $direccion_epll ?>" /></td>
	</tr>

	<tr>
		<th>Telefono:</th>
		<td><input type="text" name="txtTelefono" id="txtTelefono"  value="<?php echo $telefono_epll ?>" /></td>
	</tr>
	<tr>
		<th>Correo:</th>
		<td><input type="text" name="txtCorreo" id="txtCorreo"  value="<?php echo $correo_epll ?>" /></td>
	</tr>
	<tr>
		<th>Numero de Seguro:</th>
		<td><input type="text" name="txtNum_seg" id="txtNum_seg"  value="<?php echo $num_seguroo ?>" /></td>
	</tr>
	



	<tr>
		<th>Sucursal:</th>
		<td><select name="lstSucursall" id="lstSucursall">
			<?php 
			$consultarSucursal=$objEmpleado->consultar_sucursales();
			if($consultarSucursal->rowCount()>0){
				echo "<option value='0'>Elija una sucursal</option>";
				while($sucursal=$consultarSucursal->fetch(PDO::FETCH_OBJ)){
			?>
			<?php if($sucursal->sucursal_id==$sucursal && $sucursal!=""){
				$selected=" selected";
			}else{
				$selected="";
			} ?>
					<option value="<?php echo $sucursal->sucursal_id ?>" <?php echo $selected; ?>><?php echo $sucursal->nombre_sucu ?></option>
			<?php
				}
			}else{
			?>
				<option value="0">No hay Sucursales</option>
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
	<tr><th>Codigo</th><th>Nombre_epl</th><th>Apellido</th><th>Direccion</th><th>Telefono</th><th>Correo</th><th>N Registro</th><th>Sucursal</th><th>Modificar<th></tr>
<?php 
$consultarEmpleado=$objEmpleado->listar_empleado();
if($consultarEmpleado->rowCount()>0){
	while($empleado=$consultarEmpleado->fetch(PDO::FETCH_OBJ)){



		$sucursal=$objEmpleado->consultar_sucursal($empleado->fk_sucursal)->fetch(PDO::FETCH_OBJ);
		

		echo "<tr><td>".$empleado->empleado_id."</td><td>".$empleado->nombre_epl."</td><td>".$empleado->apellido_epl."</td>
		<td>".$empleado->direccion_epl."</td><td>".$empleado->telefono_epl."</td><td>".$empleado->correo_epl."</td><td>".$empleado->num_seguro."</td><td>".$sucursal->nombre_sucu."</td><td><a href='?mod=agregar_empleado&id=".$empleado->empleado_id."'>Mostrar</a></td></tr>";
	}
}
?>
</table>