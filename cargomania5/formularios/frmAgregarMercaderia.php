<script type="text/javascript">
function validar(){
	if(document.getElementById("cmdGuardar").value=="Guardar"){
		document.getElementById("agregarmercaderia").action="?mod=guardar_mercaderia";
	}else{
		document.getElementById("agregarmercaderia").action="?mod=actualizar_mercaderia";
	}
}</script>
<?php 
$objMercaderia=new CargoMania;
$codigo="";
$nombre="";
$tip="";
$des="";

if(isset($_GET["id"])){
	$consultarMercaderia=$objMercaderia->mostrar_mercaderia($_GET["id"]);
	if($consultarMercaderia->rowCount()==1){
		$contene=$consultarMercaderia->fetch(PDO::FETCH_OBJ);
		$codigo=$contene->cat_merca_id;
		$nombre=$contene->nombre_cat_merca;
		$tip=$contene->tipo;
		$des=$contene->descripcion;
		
	}
}

?>
<form name="agregarmercaderia" id="agregarmercaderia" method="post" onSubmit="return validar();">
<table>
	<caption><h1>AGREGAR UNA NUEVA MERCADERIA</h1></caption>
	<tr>
		<th>Codigo:</th>
		<td><input type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $codigo ?>" /></td>
	</tr>
	<tr>
		<th>Nombre:</th>
		<td><input type="text" name="txtNombre" id="txtNombre" value="<?php echo $nombre ?>" /></td>
	</tr>
	<tr>
		<th>Tipo:</th>
		<td><input type="text" name="txtTipo" id="txtTipo" value="<?php echo $tip ?>" /></td>
	</tr>
	<tr>
		<th>Descripcion:</th>
		<td><input type="text" name="txtDescripcion" id="txtDescripcion"  value="<?php echo $des ?>" /></td>
	</tr>
	
	<tr>
		<td>
		</td>
		<td  align="center" ><input type="submit" name="cmdGuardar" value="<?php if(isset($_GET["id"])){echo "Actualizar";}else{echo "Guardar";}?>" id="cmdGuardar" /></td>
	</tr>
</table>
</form>
<table>
	<tr><th>Codigo</th><th>Nombre mercaderia</th><th>Tipo</th><th>Descripcion</th></tr>
<?php 
$consultarMercaderia=$objMercaderia->listar_mercaderia();
if($consultarMercaderia->rowCount()>0){
	while($mercaderia=$consultarMercaderia->fetch(PDO::FETCH_OBJ)){
		
		echo "<tr><td>".$mercaderia->cat_merca_id."</td><td>".$mercaderia->nombre_cat_merca."</td><td>".$mercaderia->tipo."</td>
		<td>".$mercaderia->descripcion."</td><td>"."</td><td><a href='?mod=agregar_mercaderia&id=".$mercaderia->cat_merca_id."'>Mostrar</a></td></tr>";
	}
}
?>
</table>