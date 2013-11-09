<?php
include("conexion.php");
$consulta = pg_query("select proveedor_id,direccion from proveedor where proveedor_id=".$_GET['id']." order by direccion ASC");
echo "<select name='direccion' id='direccion' class='select_style' >";
while ($fila = pg_fetch_array($consulta)) {
    echo "<option value='" . $fila[0] . "'>" . utf8_encode($fila[1]) . "</option>";
}
echo "</select>";
?>