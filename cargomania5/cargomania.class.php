<?php
class CargoMania {
    //constructor
    function CargoMania() {

    }
    /*MANTENIMIENTO DE USUARIOS*/
    function consultar_usuario($campos) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from usuario where Usuario=:Usuario and Contrasena=:Pwd and Estado=1";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":Usuario",$campos[0]);
        $query->bindParam(":Pwd",$campos[1]);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
 		else
            return false;
        unset($dbh);
        unset($query);
    }
    /*MANTENIMIENTO DE AGENTES*/
    function consultar_agentes() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from agente_bodega";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_agente($id) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from agente_bodega WHERE aget_bod_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    /*MANTENIMIENTO DE CONTENEDORES*/
    function guardar_contenedor($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO contenedor VALUES(:codigo,:tamano,:numero,:sello,:agente)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$campos[0]);
        $query->bindParam(":tamano",$campos[1]);
        $query->bindParam(":numero",$campos[2]);
        $query->bindParam(":sello",$campos[3]);
        $query->bindParam(":agente",$campos[4]);
        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    

    function eliminar_contenedor($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "DELETE FROM contenedor WHERE contene_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
	function actualizar_contenedor($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("pgsql");
        $sql = "UPDATE contenedor SET tamano_conte=:tamano,numero_conte=:numero,sello_conte=:sello,fk_agent_bod=:agente WHERE contene_id=:id";
        $add = $dbh->prepare($sql);
        $add->bindParam(":id",$campos[0]);
        $add->bindParam(":tamano",$campos[1]);
        $add->bindParam(":numero",$campos[2]);
        $add->bindParam(":sello",$campos[3]);
        $add->bindParam(":agente",$campos[4]);
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
    function mostrar_contenedor($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM contenedor WHERE contene_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_contenedores(){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM contenedor";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }




/*MANTENIMIENTO DE CLIENTES*/
    function guardar_cliente($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO cliente VALUES(:codigo,:nomb_empr,:giro,:numero_reg,:direccion,:nombre_repre,:apellido_repre,:telefono_repre,:email_repre)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$campos[0]);
        $query->bindParam(":nomb_empr",$campos[1]);
        $query->bindParam(":giro",$campos[2]);
        $query->bindParam(":numero_reg",$campos[3]);
        $query->bindParam(":direccion",$campos[4]);
        $query->bindParam(":nombre_repre",$campos[5]);
        $query->bindParam(":apellido_repre",$campos[6]);
        $query->bindParam(":telefono_repre",$campos[7]);
        $query->bindParam(":email_repre",$campos[8]);
        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    

    function eliminar_cliente($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "DELETE FROM cliente WHERE cliente_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function actualizar_cliente($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("pgsql");
        $sql = "UPDATE cliente SET nombre_empr=:nomb_empr,giro=:giro,num_reg=:numero_reg,direccion=:direccion,nom_represent=:nombre_repre,apellido_represent=:apellido_repre,telefono_represent=:telefono_repre,correo=:email_repre WHERE cliente_id=:id";
        $add = $dbh->prepare($sql);
        $add->bindParam(":id",$campos[0]);
        $add->bindParam(":nomb_empr",$campos[1]);
        $add->bindParam(":giro",$campos[2]);
        $add->bindParam(":numero_reg",$campos[3]);
        $add->bindParam(":direccion",$campos[4]);
        $add->bindParam(":nombre_repre",$campos[5]);
        $add->bindParam(":apellido_repre",$campos[6]);
        $add->bindParam(":telefono_repre",$campos[7]);
        $add->bindParam(":email_repre",$campos[8]);


     
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
    function mostrar_cliente($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM cliente WHERE cliente_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_cliente(){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM cliente";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }

/*MANTENIMIENTO DE Agente de Bodega*/
    function guardar_agentebodega($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO agente_bodega VALUES(:codigo,:nomb_aget,:direccion_aget,:nombre_repre,:apellido_repre,:pais_aget)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$campos[0]);
        $query->bindParam(":nomb_aget",$campos[1]);
        $query->bindParam(":direccion_aget",$campos[2]);
        $query->bindParam(":nombre_repre",$campos[3]);
        $query->bindParam(":apellido_repre",$campos[4]);
        $query->bindParam(":pais_aget",$campos[5]);
        
        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    

    function eliminar_agentebodega($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "DELETE FROM cliente WHERE cliente_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function actualizar_agentebodega($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("pgsql");
        $sql = "UPDATE agente_bodega SET nombre_aget_bod=:nomb_aget,direccion_aget_bod=:direccion_aget,nombre_repre_aget_bod=:nombre_repre,apellido_repre_aget_bod=:apellido_repre,pais_aget_bod=:pais_aget WHERE aget_bod_id=:id";
        $add = $dbh->prepare($sql);
        $add->bindParam(":id",$campos[0]);
        $add->bindParam(":nomb_aget",$campos[1]);
        $add->bindParam(":direccion_aget",$campos[2]);
        $add->bindParam(":nombre_repre",$campos[3]);
        $add->bindParam(":apellido_repre",$campos[4]);
        $add->bindParam(":pais_aget",$campos[5]);
        


     
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
    function mostrar_agentebodega($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM agente_bodega WHERE aget_bod_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_agentebodega(){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM agente_bodega";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }

/*MANTENIMIENTO DE Servicio de Bodega*/
    function guardar_serviciobodega($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO servicio_bodega VALUES(:codigo,:nomb_serv,:precio_serv,:agente)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$campos[0]);
        $query->bindParam(":nomb_serv",$campos[1]);
        $query->bindParam(":precio_serv",$campos[2]);
        $query->bindParam(":agente",$campos[3]);
        
        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    

    function eliminar_serviciobodega($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "DELETE FROM cliente WHERE cliente_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function actualizar_serviciobodega($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("pgsql");
        $sql = "UPDATE servicio_bodega SET nombre_serv_bod=:nomb_serv,precio_serv_bod=:precio_serv,fk_agente_bod=:agente WHERE serv_bod_id=:id";
        $add = $dbh->prepare($sql);
        $add->bindParam(":id",$campos[0]);
        $add->bindParam(":nomb_serv",$campos[1]);
        $add->bindParam(":precio_serv",$campos[2]);
        $add->bindParam(":agente",$campos[3]);
    

     
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
    function mostrar_serviciobodega($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM servicio_bodega WHERE serv_bod_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_serviciobodega(){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM servicio_bodega";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }

    /*MANTENIMIENTO DE EMPLEADO*/

    function guardar_empleado($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO empleado VALUES(:empleado_id,:nombre_epl,:apellido_epl,:direccion_epl,:telefono_epl,:correo_epl,:num_seguro,:fk_sucursal)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":empleado_id",$campos[0]);
        $query->bindParam(":nombre_epl",$campos[1]);
        $query->bindParam(":apellido_epl",$campos[2]);
        $query->bindParam(":direccion_epl",$campos[3]);
        $query->bindParam(":telefono_epl",$campos[4]);
        $query->bindParam(":correo_epl",$campos[5]);
        $query->bindParam(":num_seguro",$campos[6]);
        $query->bindParam(":fk_sucursal",$campos[7]);
        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    

    function eliminar_empleado($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "DELETE FROM empleado WHERE empleado_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function actualizar_empleado($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("pgsql");
        $sql = "UPDATE empleado SET nombre_epl=:nombre,apellido_epl=:apellido,direccion_epl=:direccion,telefono_epl=:telefono,correo_epl=:correo,num_seguro=:seguro,fk_sucursal=:sucursal WHERE empleado_id=:id";
        $add = $dbh->prepare($sql);
        $add->bindParam(":id",$campos[0]);
        $add->bindParam(":nombre",$campos[1]);
        $add->bindParam(":apellido",$campos[2]);
        $add->bindParam(":direccion",$campos[3]);
        $add->bindParam(":telefono",$campos[4]);
        $add->bindParam(":correo",$campos[5]);
        $add->bindParam(":seguro",$campos[6]);
        $add->bindParam(":sucursal",$campos[7]);
        
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
    function mostrar_empleado($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM empleado WHERE empleado_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_empleado(){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM empleado";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }






  function consultar_sucursales() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from sucursal";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }

 function consultar_sucursal($id) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from sucursal WHERE sucursal_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }






/*MANTENIMIENTO DE TARIFARIO*/

    function guardar_tarifa($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO cat_tarifa VALUES(:codigo,:peso,:vol,:cliente)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$campos[0]);
        $query->bindParam(":peso",$campos[1]);
        $query->bindParam(":vol",$campos[2]);
        $query->bindParam(":cliente",$campos[3]);
        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    

    function eliminar_tarifa($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "DELETE FROM cat_tarifa WHERE cat_tarifa_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function actualizar_tarifa($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("pgsql");
        $sql = "UPDATE cat_tarifa SET cobro_peso=:peso,cobro_vol=:vol,fk_cliente=:cliente WHERE cat_tarifa_id=:id";
        $add = $dbh->prepare($sql);
        $add->bindParam(":id",$campos[0]);
        $add->bindParam(":peso",$campos[1]);
        $add->bindParam(":vol",$campos[2]);
        $add->bindParam(":cliente",$campos[3]);
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
    function mostrar_tarifa($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM cat_tarifa WHERE cat_tarifa_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_tarifas(){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM cat_tarifa";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }






  function consultar_clientes() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from cliente";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }

 function consultar_cliente($id) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from cliente WHERE cliente_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }





/*MANTENIMIENTO DE PROVEEDOR*/
    function guardar_proveedor($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO proveedor VALUES(:codigo,:nombre,:pais,:direccion,:telefono,:correo)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$campos[0]);
        $query->bindParam(":nombre",$campos[1]);
        $query->bindParam(":pais",$campos[2]);
        $query->bindParam(":direccion",$campos[3]);
        $query->bindParam(":telefono",$campos[4]);
        $query->bindParam(":correo",$campos[5]);
        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    

    function eliminar_proveedor($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "DELETE FROM proveedor WHERE proveedor_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function actualizar_proveedor($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("pgsql");
        $sql = "UPDATE proveedor SET nombre_prov=:nombre,pais_prov=:pais,direccion=:direccion,telefono_prov=:telefono,correo_prov=:correo WHERE proveedor_id=:id";
        $add = $dbh->prepare($sql);
        $add->bindParam(":id",$campos[0]);
        $add->bindParam(":nombre",$campos[1]);
        $add->bindParam(":pais",$campos[2]);
        $add->bindParam(":direccion",$campos[3]);
        $add->bindParam(":telefono",$campos[4]);
        $add->bindParam(":correo",$campos[5]);
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
    function mostrar_proveedor($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM proveedor WHERE proveedor_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_proveedor(){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM proveedor";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }



































 /*MANTENIMIENTO DE ADUANA_LLEGADA*/
    function guardar_aduana_llegada($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO aduana_llegada VALUES(:codigo,:nombre,:direccion,:tipo,:pais)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$campos[0]);
        $query->bindParam(":nombre",$campos[1]);
        $query->bindParam(":direccion",$campos[2]);
        $query->bindParam(":tipo",$campos[3]);
        $query->bindParam(":pais",$campos[4]);
        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    

    function eliminar_aduana_llegada($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "DELETE FROM aduana_llegada WHERE adu_llega_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function actualizar_aduana_llegada($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("pgsql");
        $sql = "UPDATE aduana_llegada SET nombre_adu_llega=:nombre,direccion_adu_llega=:direccion,tipo_adu_llega=:tipo,pais_adu_llega=:pais WHERE adu_llega_id=:id";
        $add = $dbh->prepare($sql);
        $add->bindParam(":id",$campos[0]);
        $add->bindParam(":nombre",$campos[1]);
        $add->bindParam(":direccion",$campos[2]);
        $add->bindParam(":tipo",$campos[3]);
        $add->bindParam(":pais",$campos[4]);
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
    function mostrar_aduana_llegada($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM aduana_llegada WHERE adu_llega_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_aduana_llegada(){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM aduana_llegada";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }




////  -________________________________________--

    function consultar_proveedores() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from proveedor";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }

  function mostrar_proveedores($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM proveedor WHERE proveedor_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }




/*MANTENIMIENTO DE MERCADERIA*/
    function guardar_mercaderia($campos){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO cat_mercaderia VALUES(:codigo,:nombre,:tip,:des)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$campos[0]);
        $query->bindParam(":nombre",$campos[1]);
        $query->bindParam(":tip",$campos[2]);
        $query->bindParam(":des",$campos[3]);
      
        $query->execute(); // Ejecutamos la consulta
        if ($query){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    

    function eliminar_mercaderia($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "DELETE FROM contenedor WHERE contene_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function actualizar_mercaderia($campos) {
        $con = new DBManager();
        $dbh = $con->conectar("pgsql");
        $sql = "UPDATE cat_mercaderia SET nombre_cat_merca=:nombre,tipo=:tip,descripcion=:des WHERE cat_merca_id=:id";
        $add = $dbh->prepare($sql);
        $add->bindParam(":id",$campos[0]);
        $add->bindParam(":nombre",$campos[1]);
        $add->bindParam(":tip",$campos[2]);
        $add->bindParam(":des",$campos[3]);
    
        $add->execute();
        if ($add)
           return true;
        else
           return false;
        unset($dbh);
        unset($add);
    }
    function mostrar_mercaderia($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM cat_mercaderia WHERE cat_merca_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_mercaderia(){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM cat_mercaderia";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }






function consultar_aduana() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from aduana_llegada";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }



// mostrar flete

    function mostrar_flete($id){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM agente_flete WHERE agent_fle_id=:id";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":id",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }



function consultar_fletes() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "select * from agente_flete";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }


}

?>
