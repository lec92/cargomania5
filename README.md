cargomania5
===========
 conf.php //clase  
 
 
/****************** cotizacion**********************/
$conf['agregar_Cotizacion']=array(
'archivo'=>'frmAgregarCotizacion.php',
'layout'=>LAYOUT_CLIENTE
);
$conf['guardar_Cotizacion']=array(
'archivo'=>'guardarCotizacion.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['actualizarcotizacion']=array(
'archivo'=>'actualizarcotizacion.php',
'layout'=>LAYOUT_CLIENTE
);


?>



/***************************************************************************/

//CLASE cargomania.class.php

    /*GUARDAR COTIZACIONES*/
     function guardar_cotizacion($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO cotizacion(nombre,apellido,pais,telefono1,telefono2,correo,pais1,ciudad1,cpostal1,pais2,ciudad2,cpostal2,tmercaderia,tflete,peso,volumen,fecha) VALUES(:nombre,:apellido,:pais,:telefono1,:telefono2,:correo,:pais1,:ciudad1,:cpostal1,:pais2,:ciudad2,:cpostal2,:tmercaderia,:tflete,:peso,:volumen,:fecha)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nombre",$campos[0]);
        $query->bindParam(":apellido",$campos[1]);
        $query->bindParam(":pais",$campos[2]);
		$query->bindParam(":telefono1",$campos[3]);
		$query->bindParam(":telefono2",$campos[4]);
        $query->bindParam(":correo",$campos[5]);
          $query->bindParam(":pais1",$campos[6]);
		$query->bindParam(":ciudad1",$campos[7]);
		$query->bindParam(":cpostal1",$campos[8]);
        $query->bindParam(":pais2",$campos[9]);
          $query->bindParam(":ciudad2",$campos[10]);
          $query->bindParam(":cpostal2",$campos[11]);
		$query->bindParam(":tmercaderia",$campos[12]);
		$query->bindParam(":tflete",$campos[13]);
        $query->bindParam(":peso",$campos[14]);
        $query->bindParam(":volumen",$campos[15]);
        $query->bindParam(":fecha",$campos[16]);



        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }

