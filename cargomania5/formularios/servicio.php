<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=windows-1252" http-equiv="content-type">
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
     <script type="text/javascript" src="jquery-flete.js" ></script>
    <link href="../css/style4.css" rel="stylesheet" type="text/css">
    <title>Cargomania - Servicio nuevo</title>

 <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#prove').change(function(){
                    var id=$('#prove').val();
                    $('#direccion').load('ajax.php?id='+id);
                    $('#pais').load('ajax_pais_prov.php?id='+id);
                });    
            });
        </script>


       

<script type="text/javascript">
function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 
posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script> 

<?php




//cliente


$objCliente = new Cargomania;

if(isset($_GET["id"])){
  $consultarCliente=$objCliente->mostrar_cliente($_GET["id"]);
  if($consultarCliente->rowCount()==1){
    $cliente=$consultarCliente->fetch(PDO::FETCH_OBJ);
    $cli=$cliente->nombre_empr;


  }

} 

//

$objServicio = new Cargomania;
$agente="";
if(isset($_GET["id"])){
  $consultarContenedor=$objContenedor->mostrar_contenedor($_GET["id"]);
  if($consultarContenedor->rowCount()==1){
    $contene=$consultarContenedor->fetch(PDO::FETCH_OBJ);
    $proveedor=$contene->fk_proveedor;



  }

}


   

$objAduana = new Cargomania;

if(isset($_GET["id"])){
  $consultarAduana=$objAduana->mostrar_aduana_llegada($_GET["id"]);
  if($consultarAduana->rowCount()==1){
    $adu=$consultarAduana->fetch(PDO::FETCH_OBJ);
    $adu=$contene->nombre_adu_llega;


  }

} 



$objFlete = new Cargomania;

if(isset($_GET["id"])){
  $consultarFlete=$objFlete->mostrar_flete($_GET["id"]);
  if($consultarFlete->rowCount()==1){
    $flete=$consultarFlete->fetch(PDO::FETCH_OBJ);
    $nombre=$contene->nombre_agent_fle;
   


  }

} 

 

/*

 $sql = "SELECT * FROM cliente where cliente_id=1";

 $result = pg_query($cnx,$sql);
if (!$result){

  echo "ocurrio un error";
  exit;
}

*/





?>






  </head>
  <body> <img src="imagenes/logo.png" width="250px">
 <form method="POST" action=""> 
    <table class="formulario" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="4" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Cliente</span>
          
           <a href="javascript:popup('?mod=agregar_cliente',500,700)"><img
              title="Agregar cliente" src="imagenes/botones/agregar.png" align="right"></a>
          
         
         
          <a href="javascript:popup('?mod=agregar_cliente',500,700)"><img

              title="Editar cliente" src="imagenes/botones/editar.png" align="right"></a> <img

              </td>
        </tr>
        <tr>


           <?php

          if($_POST['buscador']){

            $buscar = $_POST['lstCliente'];
            if(empty($buscar)){
              echo "no se encontro nada";
            }else{



              $sql = "SELECT * FROM cliente WHERE cliente_id = '$buscar'";

              $result = pg_query($cnx,$sql);
              if(!$result){
                echo 'ocurrio un error';

              }

              


              while($row = pg_fetch_array($result)){

                



 ?>
 <!-- comienza aqui  -->
            





          <td class="categoria_cliente">Codigo</td>
          <td><input class="text_area" name="test" disabled="disabled" value="<?php echo $row['cliente_id']; ?>"

              type="text"></td>
          <td class="categoria_cliente">País cliente</td>
          <td class="categoria_cliente_derecha"> <label class="text_area">el salvador (campo faltante)</label> </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Fecha</td>
          <td><input class="text_area" name="test" disabled="disabled" value="<?php  date_default_timezone_get('UTC'); echo date("d-m-Y") ?>"

              type="text"></td>
          <td class="categoria_cliente">Direccion cliente</td>
          <td> <label class="text_area"><?php echo $row['direccion'];?></label></td>
        </tr>
        <tr>
          <td class="categoria_cliente">Hora</td>
          <td><input class="text_area" name="test" disabled="disabled" value="<?php echo date('H:i:s'); ?> "

              type="text"></td>
          <td class="categoria_cliente">Telefono</td>
          <td> <label class="text_area"><?php  echo $row['telefono_represent'];?></label> </td>
        </tr>
        <tr>

          <td class="categoria_cliente">Tarifa</td>
          <td><label class="text_area">$500</label> </td>
</tr>


             <!-- termina aqui  -->


             

              <?php

              }
            }

          }


         ?>






        <tr>
          
          <td class="categoria_cliente">Nombre cliente</td>
          <td>
            

             <select name="lstCliente" id="lstCliente" class="select_style">
      <?php 
      $consultarCliente=$objCliente->consultar_clientes();
      if($consultarCliente->rowCount()>0){
        echo "<option value='0'>Elija un cliente</option>";
        while($cli=$consultarCliente->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($cli->cliente_id==$cli && $cli!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $cli->cliente_id ?>" <?php echo $selected; ?>><?php echo $cli->nombre_empr ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay clientes</option>
      <?php
      }
      ?>
    </select>






          </td>
       
          <td>
            <input type="submit" name="buscador" value="Buscar" />
        


          </td>




          <!--  tarifa-->
        </tr>
      </tbody>
    </table>
    <hr>
    <table class="formulario" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="10" rowspan="1" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Informacion
              de la carga</span></td>
        </tr>
        <tr class="cat_titulo">
          <td>Bultos</td>
          <td>Peso</td>
          <td>Volumen (opcional)</td>
          <td>Tipo carga</td>
          <td>Servicio bodega</td>
          <td>Bodega</td>
          <td>N° Contenedor</td>
          <td>N° Sello</td>
          <td>Estado</td>
          <td>Agregar</td>
        </tr>
        <tr>
          <td> <input class="text_area2" name="test" placeholder="1000" type="text">
          </td>
          <td> <input class="text_area2" name="test" placeholder="1000 lbs" type="text">
          </td>
          <td> <input class="text_area2" name="test" placeholder="8.7 m3" type="text">
          </td>
          <td> <input class="text_area3" name="test" placeholder="Computadoras"

              type="text"> </td>
          <td>         
              <select class="select_style_bodega">
            
                <!--  fin  -->




                <!-- fin-->








          <td> <select class="select_style_bodega">
              <option value="0" selected="selected">San geronimo</option>
            </select> </td>
          <td> <input class="text_area2" name="test" placeholder="SMLV 123456-7"

              type="text"> </td>
          <td> <input class="text_area2" name="test" placeholder="01443" type="text">
          </td>
          <td>
            <select class="select_status_style">
              <option value="0" selected="selected">En espera...</option>
              <option value="1">Cargado</option>
              <option value="2">Pendiente</option>
              <option value="3">Anulado</option>
            </select>
          </td>
          <td align="center"> <img src="imagenes/botones/plus.png"></img> </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <table class="formulario" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="2" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Proveedor</span><a href="?mod=agregar_proveedor"> <a href="javascript:popup('?mod=agregar_proveedor',500,700)"><img

              title="Agregar cliente" src="imagenes/botones/agregar.png" align="right"></a>
               <a href="javascript:popup('?mod=agregar_proveedor',500,700)"><img

              title="Editar cliente" src="imagenes/botones/editar.png" align="right"></a></td>
        </tr>
        <tr>
          <td class="categoria_cliente">Nombre proveedor</td>
          <td>
           
             <?php
        $consulta=pg_query("select proveedor_id,nombre_prov from proveedor order by nombre_prov ASC");
        echo "<select name='prove' id='prove' class='select_style' >";
        echo "<option>seleccione proveedor</option>";
        while ($fila=pg_fetch_array($consulta)){
            
            echo "<option value='".$fila[0]."'>".utf8_encode($fila[1])."</option>";
        }
        echo "</select>";
        ?>




          </td>
        </tr>
        <tr>
         
           <td class="categoria_cliente">Pais</td>
          <td>
           
             
            <div id="pais">
            <select name="edo" class="select_style">
                <option value="">Seleccione pais </option>
            </select>
        </div>



          </td>





        </tr>
        <tr>
           <td class="categoria_cliente">Direccion Proveedor</td>
          <td>
           
             
            <div id="direccion">
            <select name="edo" class="select_style" >
                <option value="">Seleccione Direccion </option>
            </select>
        </div>



          </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <table class="formulario" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="5" rowspan="1" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Naviera</span></td>
        </tr>
        <tr>
          <td class="categoria_cliente">Dia salida</td>
          <td><input class="text_area" name="test" type="date"> </td>
          <td class="categoria_cliente">Tipo transporte</td>
          <td>
            <select class="select_status_style" id="select_transport">
              <option value="maritimo">MARÍTIMO</option>
              <option value="aereo">AEREO</option>
              <option value="terrestre" >TERRESTRE</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Dia llegada</td>
          <td><input class="text_area" name="test" type="date"> </td>
          <div class="barco">
          <td class="categoria_cliente">Nombre barco</td>
          <td><input class="text_area" name="test" placeholder="HANSA KRISTIANSAND"

              type="text"> </td></div>

             
        </tr>
        <tr>




          <td class="categoria_cliente">Lugar de  salida</td>

          <!-- comienza -->


<td>


              <select name="lstAduana" id="lstAduana" class="select_style">
      <?php 
      $consultarAduana=$objAduana->consultar_aduana();
      if($consultarAduana->rowCount()>0){
        echo "<option value='0'>Elija un aduana</option>";
        while($adu=$consultarAduana->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($adu->adu_llega_id==$adu && $adu!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $adu->adu_llega_id ?>" <?php echo $selected; ?>><?php echo $adu->nombre_adu_llega ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay aduanas</option>
      <?php
      }
      ?>
    </select>







<div class="avion">
          <td class="categoria_cliente">numero de vuelo </td>
          <td><input class="text_area" name="test" placeholder="BA 100 EZE-LHT " type="text"></td>
          



            </td></div>






            <!-- termina -->


          <!--<td><input class="text_area" name="test" placeholder="CRISTOBAL" type="text"> -->
          </td>
          </tr>
          <td class="categoria_cliente">N° Booking</td>
          <td><input class="text_area" name="test" placeholder="CZL 07-13" type="text">
          </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Lugar de  llegada</td>
          

          <td>


              <select name="lstAduana" id="lstAduana" class="select_style">
      <?php 
      $consultarAduana=$objAduana->consultar_aduana();
      if($consultarAduana->rowCount()>0){
        echo "<option value='0'>Elija un aduana</option>";
        while($adu=$consultarAduana->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($adu->adu_llega_id==$adu && $adu!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $adu->adu_llega_id ?>" <?php echo $selected; ?>><?php echo $adu->nombre_adu_llega ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay aduanas</option>
      <?php
      }
      ?>
    </select>







          </td>
        </tr>






          <td class="categoria_cliente">Pais naviera</td>
          <td>            <select class="select_style_naviera">
              <option value="0" selected="selected">Estados Unidos</option>
              <option value="1">Japon</option>
            </select></td>
        </tr>
        <tr>
          <!--
          <td class="categoria_cliente">Destino final</td>
          <td><input class="text_area" name="test" placeholder="BODESA" type="text">
          </td> -->
          <td class="categoria_cliente">N° BL</td>
          <td><input class="text_area" name="test" placeholder="73283HBL-54594"

              type="text"> </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Nombre naviera</td>
         
<td>

              <select name="lstFletes" id="lstFletes" class="select_style">
      <?php 
      $consultarFlete=$objFlete->consultar_fletes();
      if($consultarFlete->rowCount()>0){
        echo "<option value='0'>Elija un aduana</option>";
        while($flete=$consultarFlete->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($flete->agent_fle_id==$flete && $flete!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $flete->agent_fle_id ?>" <?php echo $selected; ?>><?php echo $flete->nombre_agent_fle ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay fletes</option>
      <?php
      }
      ?>
    </select>




      </td>



        </tr>
      </tbody>
    </table>
    </br>
    <center>
<button value="Cancelar" name="cancelar">CANCELAR</button>
<button value="Cargar" name="cargar">GUARDAR</button>
</center>
    </br> 
    </br>
    <hr>
    <table class="formulario" border="1" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="13" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Movimientos
              en cola</span><br>
          </td>
        </tr>
        <tr class="cat_titulo">
          <td>N°</td>
          <td>Proveedor</td>
          <td>Cliente</td>
          <td>Bultos</td>
          <td>Peso Kgs</td>
          <td>Volumen</td>
          <td>Descripcion</td>
          <td>Servicio bodega</td>
          <td>Bodega</td>
          <td>Tipo Movimiento</td>
          <td>Estado</td>
          <td>Editar </td>
          <td>Eliminar </td>
        </tr>
        <tr>
          <td>SAL0501</td>
          <td>SAMSUNG ELECTRONICS LATINOAMERICA SA</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>3</td>
          <td>1300.00</td>
          <td>8.84</td>
          <td>REPRODUCTOR DVD</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
        <tr>
          <td>SAL0502</td>
          <td>SYL INTERNATIONAL</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>1</td>
          <td>1177.00</td>
          <td>1.00</td>
          <td>CADENAS, EMPATE DE CADENAS, BALINERA DE BOLA</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
        <tr>
          <td>SAL0503</td>
          <td>CONNEXION ZONA LIBRE SA</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>181</td>
          <td>3291.04</td>
          <td>10.97</td>
          <td>ACCESORIOS PARA AUTOS</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
        <tr>
          <td>SAL0504</td>
          <td>NORITEX SA</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>647</td>
          <td>6393.02</td>
          <td>31.74</td>
          <td>ARTICULOS PARA EL HOGAR</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
        <tr>
          <td>SAL0505</td>
          <td>ZAGA ENTERPRISSE</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>70</td>
          <td>578.00</td>
          <td>2.44</td>
          <td>PANTALONES CORTOS PARA HOMBRES</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
      </tbody>
    </table>
      </form>
  </body>
</html>
