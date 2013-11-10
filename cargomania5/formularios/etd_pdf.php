<?php
	//ini_set('session.save_handler','files');
	require_once("../lib/fpdf/fpdf.php");

class PDF extends FPDF 
{
//Cabecera de página
function Header()
{
    //Logo
	$this->Image('../Imagenes/Logo.jpg',10,6,50);
    //Arial bold 15
    $this->SetFont('Arial','B',11);
    //Movernos a la derecha
    //Título
    $this->Cell(230,2,'"Consolidando la Amistad y la Carga de nuestros Clientes"',0,1,'C'); 
     $this->Ln(25);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,2,'NOTIFICACION ARRIBO DE CARGA',0,1,'C'); 
    $this->Ln(3);
	$this->Ln(15);
    //Salto de;línea
    
} 

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-35);
    //Arial italic 8
    $this->SetFont('Arial','I',10);
    //Número de página
    $this->Cell(0,20,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}


}
$con=pg_connect("user=postgres port=5434 dbname=cargomania host=localhost password=123456");
//$bd=pg_select($con,"cargomania",$_POST);						     							
$cons1 = pg_query($con,"SELECT  c.nom_represent,c.apellido_represent,
								dm.cantidad_merca,dm.volumen_merca,
						       dm.peso_merca,s.puerto_sali_serv,
       							s.fch_sal_bod_serv,s.fch_est_llega_serv,
       							s.puerto_llega_serv,ab.nombre_aget_bod
						FROM   servicio s, det_mercaderia dm,
       							servicio_bodega sb,agente_bodega ab,rol r,
       							cliente c
						WHERE  s.fk_det_merca = dm.det_merca_id
						AND    s.fk_servi_bod = sb.serv_bod_id
						AND    sb.fk_agente_bod = ab.aget_bod_id
						AND    s.fk_rol = r.rol_id
						AND    r.fk_cliente = c.cliente_id
						AND    c.cliente_id =". $_POST["CID"]

			);
$row = pg_fetch_array($cons1);

$pdf=new PDF(); /*Se define las propiedades de la página */
$pdf->AliasNbPages();
$pdf->AddPage(); /* Se añade una nueva página */
$pdf->SetFont('Arial','',12);/* Se define el tipo de fuente: Arial en negrita de ta */

	$pdf->Cell(60,10,'Para: '.$row["nom_represent"].' '.$row["apellido_represent"],0,0,'L',FALSE);
	$pdf->Ln(8);
	$pdf->Cell(20,10,'Fecha: ',0,0,'L',FALSE);
	$pdf->Cell(20,10,date("d/m/y"),0,0,'L',FALSE);
	$pdf->Ln(10);
	$pdf->Cell(60,10,utf8_decode("Estimados Señores:") ,0,0,'L',FALSE); 
	$pdf->Ln(10);
	$pdf->Cell(60,10,'Por este medio informamos a usted que la mercaderia de su proveedor fue , ',0,0,'L',FALSE);
	$pdf->Ln(5);
	$pdf->Cell(60,10,'embarcada hacia nuestro pais, se presenta el detalle a  continuacion:',0,0,'L',FALSE);
	$pdf->Ln(15);




$lk=0;

  $pdf->SetFont('Arial','',12);


	//Títulos de las columnas
	//$header=array('	Miembro','Nombre',);

	//Colores, ancho de línea y fuente en negrita
	$pdf->SetFillColor(160,164,166);
	$pdf->SetTextColor(255);
	$pdf->SetDrawColor(128,128,128);
	$pdf->SetLineWidth(.3);
	$pdf->SetFont('','B');
	//Cabecera
	$w=60;
	for($i=0;$i<2;$i++)
		//$pdf->Cell($w,7,$header[0],1,0,'C',1);
	//$pdf->Ln();
	//Restauración de colores y fuentes
	$pdf->SetFillColor(224,235,255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('');
	//Datos
	$fill=false;
	$i=0;
	$cons11 = pg_query($con,"SELECT c.nom_represent,c.apellido_represent,
	   dm.cantidad_merca,dm.volumen_merca,
       dm.peso_merca,s.puerto_sali_serv,
       s.fch_sal_bod_serv,s.fch_est_llega_serv,
       s.puerto_llega_serv,ab.nombre_aget_bod,
       p.nombre_prov
FROM   servicio s, det_mercaderia dm,
       servicio_bodega sb,agente_bodega ab,rol r,
       cliente c,proveedor p
WHERE  s.fk_det_merca = dm.det_merca_id
AND    s.fk_servi_bod = sb.serv_bod_id
AND    sb.fk_agente_bod = ab.aget_bod_id
AND    s.fk_rol = r.rol_id
AND    s.fk_proveedor = p.proveedor_id
AND    r.fk_cliente = c.cliente_id
AND    c.cliente_id = ".$_POST["CID"]."
       ");

	/*while($row = pg_fetch_array($cons1) )
	{
	    $i++;	*/
	    
	   $pdf->Cell($w,10,'Numero de Bultos','1',0,'C',FALSE);
		$pdf->Cell($w,10,$row[2],'1',0,'C',FALSE);
		$pdf->Ln();
		$pdf->Cell($w,10,'Peso','1',0,'C',FALSE);
		$pdf->Cell($w,10,$row[3],'1',0,'C',FALSE);
		$pdf->Ln();
		$pdf->Cell($w,10,'Volumen','1',0,'C',FALSE);
		$pdf->Cell($w,10,$row[4],'1',0,'C',FALSE);
		$pdf->Ln();
		$pdf->Cell($w,10,'Origen','1',0,'C',FALSE);
		$pdf->Cell($w,10,$row[5],'1',0,'C',FALSE);
		$pdf->Ln();
		$pdf->Cell($w,10,'Fecha de Salida de ','1',0,'C',FALSE);
		$pdf->Cell($w,10,$row[6],'1',0,'C',FALSE);
		$pdf->Ln();
		$pdf->Cell($w,10,'Fecha de llegada a Puerto','1',0,'C',FALSE);
		$pdf->Cell($w,10,$row[7],'1',0,'C',FALSE);
		$pdf->Ln();
		$pdf->Cell($w,10,'Frontera de ingreso','1',0,'C',FALSE);
		$pdf->Cell($w,10,$row[8],'1',0,'C',FALSE);
		$pdf->Ln();
		$pdf->Cell($w,10,'Almacen Fiscal','1',0,'C',FALSE);
		$pdf->Cell($w,10,$row[9],'1',1,'C',FALSE);
	//	$fill=!$fill;
	//}
	$pdf->Ln();
	//$pdf->Cell(60,0,'','T'); 
	$pdf->Cell(60,10,'Sin otro particular por le momento nos suscribimos de ustedes,',0,0,'L',FALSE); 
	$pdf->Ln(5);
	$pdf->Cell(60,10,'Atentamente',0,1,'L',FALSE);
	$pdf->Ln(18);
	$pdf->Cell(60,10,'Jenny Diaz',0,0,'L',FALSE);
	$pdf->Ln(5);
	$pdf->Cell(60,10,'CARGOMANIA S.A de C.V',0,0,'L',FALSE);
	$pdf->Ln();
	$pdf->Cell(60,10,'Cond. Medicentro La Esperanza Local C-212, 25 Avenida Norte y 23 Calle ',0,0,'L',FALSE); 
	$pdf->Ln(5);
	$pdf->Cell(60,10,'Poniente, San Salvador, El Salvador.',0,0,'L',FALSE);
	$pdf->Ln(5);
	$pdf->Cell(60,10,'Tels.:(503) 2235-7005, 2235.2235-7011',0,0,'L',FALSE);
	$pdf->Ln(5);
	$pdf->Cell(60,10,'Fax: (503) 2521-5301',0,0,'L',FALSE);
$pdf->Output(); /* El documento se cierra y se envía al navegador */

?>
