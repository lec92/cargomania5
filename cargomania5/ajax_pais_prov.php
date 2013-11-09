<?php
include("conexion.php");
$consulta = pg_query("select proveedor_id,pais_prov from proveedor where proveedor_id=".$_GET['id']." order by pais_prov ASC");
echo "<select name='pais' id='pais' class='select_style'>";
while ($fila = pg_fetch_array($consulta)) {
    echo "<option value='" . $fila[0] . "'>" . utf8_encode($fila[1]) . "</option>";
}
echo "</select>";
?>