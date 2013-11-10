<?php
function cliente_id($nombre,$valor)
{
	include("config.inc.php");
	$query = "SELECT * from cliente order by nombre_empr";
	//mysql_select_db($dbname);
	$result = pg_query($query);
	echo "<select name='CID' id='$nombre'>";
	echo "<option value=''>Selecciona un cliente...</option>";
	while($registro=pg_fetch_array($result))
	{
		echo "<option value='".$registro["cliente_id"]."'";
		if ($registro["cliente_id"]==$valor);
		echo ">".$registro["nombre_empr"]."</option>\r\n";
	}
	echo "</select>";
}

function proveedor_id($nombre,$valor)
{
	include("config.inc.php");
	$query = "SELECT * FROM proveedor order by nombre_prov";
	pg_select($cnx,$dbname,$_POST);
	$result = pg_query($query);
	echo "<select name='CPR' id='$nombre'>";
	echo "<option value=''>Selecciona un proveedor...</option>";
	while($registro=pg_fetch_array($result))
	{
		echo "<option value='".$registro["proveedor_id"]."'";
		if ($registro["proveedor_id"]==$valor);
		echo ">".$registro["nombre_prov"]."</option>\r\n";
	}
	echo "</select>";
}

?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
	<title>SERVICIO</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		/* COMBOBOX */
		$("#cliente_id").change(function(event)
		{
			var cliente_id = $(this).find(':selected').val();
			$("#pidproveedor").html("<img src='loading.gif' />");
			$("#pidproveedor").load('combobox.php?buscar=proveedor&cliente_id='+cliente_id);
			var proveedor_id = $("#proveedor_id").find(':selected').val();
			$("#piddireccion").html("<img src='loading.gif' />");
			$("#piddireccion").load('combobox.php?buscar=direccion&proveedor_id='+proveedor_id);
			$("#pidpais").html("<img src='loading.gif' />");
			$("#pidpais").load('combobox.php?buscar=pais&proveedor_id='+proveedor_id);
		});
		$("#proveedor_id").live("change",function(event)
		{
			var id = $(this).find(':selected').val();
			$("#piddireccion").html("<img src='loading.gif' />");
			$("#piddireccion").load('combobox.php?buscar=direccion&proveedor_id='+id);
			$("#pidpais").html("<img src='loading.gif' />");
			$("#pidpais").load('combobox.php?buscar=pais&proveedor_id='+id);
		});
	});
	</script>
	<style>
	select{padding:5px;border:1px solid #bbb;border-radius:5px;margin:5px 0;display:block;box-shadow:0 0 10px #ddd}
	#resultados{margin:20px 0;padding:20px;border:10px solid #ddd;}
	</style>
</head>
<body>
<h1>Documentacion</h1>
<p>
<strong>Generacion de ETD</strong> </p>
</p>
<form method="post" action="formularios/etd_pdf.php">
	<fieldset>
		<p><label>Seleccione Cliente:</label><?php cliente_id("cliente_id","1"); ?></p>
		<p id="pidproveedor"><label>Seleccione Proveedor:</label><?php proveedor_id("proveedor_id","2"); ?></p>
		<p><input type="hidden" name="hval"><input type="submit" name="submit" value="GENERAR" /></p>
	</fieldset>
</form>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-266167-20");
//pageTracker._setDomainName(".martiniglesias.eu");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
