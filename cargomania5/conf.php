<?php
define('MODULO_DEFECTO','login');
define('LAYOUT_DEFECTO','inicio.php');//Administrador
define('LAYOUT_LOGIN','login.php');//Administrador
define('LAYOUT_CLIENTE','cliente.php');
define('LAYOUT_ADMIN','admin.php');
define('LAYOUT_POPUP','popup.php');
define('LAYOUT_POPUP2','popup2.php');
define('LAYOUT_POPUP3','popup3.php');
define('LAYOUT_INICIO','inicio.php');//Para cualquier tipo de usuario
define('MODULO_PATH',realpath('formularios'));
define('LAYOUT_PATH',realpath('plantillas'));
//ADMINISTRADOR DE CUENTAS ELECTRÓNICAS

//Modulos de manejo usuarios

$conf['login']=array(
'archivo'=>'frmLogin.php',
'layout'=>LAYOUT_LOGIN
);
$conf['404']=array(
'archivo'=>'404.php',
'layout'=>LAYOUT_INICIO
);
$conf['autenticar']=array(
'archivo'=>'autenticar.php',
'layout'=>LAYOUT_INICIO
);
$conf['logout']=array(
'archivo'=>'logout.php',
'layout'=>LAYOUT_INICIO
);

$conf['changePwd']=array(
'archivo'=>'frmCambiarContra.php',
'layout'=>LAYOUT_INICIO
);
$conf['cambiarPwd']=array(
'archivo'=>'procesoFrmCambiarContra.php',
'layout'=>LAYOUT_INICIO
);
$conf['resetPwdUser']=array(
'archivo'=>'pwdRecovery.php',
'layout'=>LAYOUT_INICIO
);

//MODULOS DEL CLIENTE
$conf['seguimiento_mercaderia']=array(
'archivo'=>'segumiento_mercaderia.html',
'layout'=>LAYOUT_CLIENTE
);

$conf['menu']=array(
'archivo'=>'index2.html',
'layout'=>LAYOUT_CLIENTE
	);

$conf['menu2']=array(
'archivo'=>'index1.html',
'layout'=>LAYOUT_CLIENTE
	);

$conf['tarifa']=array(
'archivo'=>'tarifario.html',
'layout'=>LAYOUT_POPUP
	);


$conf['cliente']=array(
'archivo'=>'Formulario_cliente.html',
'layout'=>LAYOUT_POPUP
	);


$conf['empleados']=array(
'archivo'=>'empleado.html',
'layout'=>LAYOUT_POPUP
	);

$conf['empleados']=array(
'archivo'=>'empleado.html',
'layout'=>LAYOUT_POPUP
	);


$conf['proveedor']=array(
'archivo'=>'Formulario_proveedor.html',
'layout'=>LAYOUT_POPUP
	);

$conf['agent_bodega']=array(
'archivo'=>'agente_bodega.html',
'layout'=>LAYOUT_POPUP
	);

$conf['contenedor']=array(
'archivo'=>'contenedor.html',
'layout'=>LAYOUT_POPUP2
	);

$conf['archivo']=array(
'archivo'=>'archivo.html',
'layout'=>LAYOUT_POPUP
	);


$conf['servicios']=array(
'archivo'=>'servicio.php',
'layout'=>LAYOUT_POPUP3
	);

$conf['agentes']=array(
'archivo'=>'agente_flete.html',
'layout'=>LAYOUT_POPUP
	);

$conf['merc']=array(
'archivo'=>'mercaderia.html',
'layout'=>LAYOUT_POPUP
	);

$conf['adu']=array(
'archivo'=>'aduana.html',
'layout'=>LAYOUT_POPUP
	);

$conf['ma']=array(
'archivo'=>'manual.html',
'layout'=>LAYOUT_POPUP3

	);

$conf['est']=array(
'archivo'=>'Estadistica.html',
'layout'=>LAYOUT_POPUP3

	);
$conf['agregar_contenedor']=array(
'archivo'=>'frmAgregarContenedor.php',
'layout'=>LAYOUT_CLIENTE
);
$conf['guardar_contenedor']=array(
'archivo'=>'guardarContenedor.php',
'layout'=>LAYOUT_CLIENTE
);	

$conf['actualizar_contenedor']=array(
'archivo'=>'actualizarContenedor.php',
'layout'=>LAYOUT_CLIENTE
);

// MODULO CLIENTE
$conf['agregar_cliente']=array(
'archivo'=>'frmAgregarCliente.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['guardar_cliente']=array(
'archivo'=>'guardarCliente.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['actualizar_cliente']=array(
'archivo'=>'actualizarCliente.php',
'layout'=>LAYOUT_CLIENTE
);

// MODULO AGENTE BODEGA
$conf['agregar_agentebodega']=array(
'archivo'=>'frmAgregarAgenteBodega.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['guardar_AgenteBodega']=array(
'archivo'=>'guardarAgenteBodega.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['actualizar_AgenteBodega']=array(
'archivo'=>'actualizarAgenteBodega.php',
'layout'=>LAYOUT_CLIENTE
);

// MODULO SERVICIO BODEGA
$conf['agregar_serviciobodega']=array(
'archivo'=>'frmAgregarServicioBodega.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['guardar_serviciobodega']=array(
'archivo'=>'guardar_ServicioBodega.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['actualizar_ServicioBodega']=array(
'archivo'=>'actualizar_ServicioBodega.php',
'layout'=>LAYOUT_CLIENTE
);

//MODULO DE EMPLEADO

$conf['agregar_empleado']=array(
'archivo'=>'frmAgregarEmpleado.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['guardar_empleado']=array(
'archivo'=>'guardarEmpleado.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['actualizar_empleado']=array(
'archivo'=>'actualizarEmpleado.php',
'layout'=>LAYOUT_CLIENTE
);



//MODULO DE TARIFARIO

$conf['agregar_tarifa']=array(
'archivo'=>'frmAgregarTarifa.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['guardar_tarifa']=array(
'archivo'=>'guardarTarifa.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['actualizar_tarifa']=array(
'archivo'=>'actualizarTarifa.php',
'layout'=>LAYOUT_CLIENTE
);


//MODULO DE PROVEEDOR

$conf['agregar_proveedor']=array(
'archivo'=>'frmAgregarProveedor.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['guardar_proveedor']=array(
'archivo'=>'guardarProveedor.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['actualizar_proveedor']=array(
'archivo'=>'actualizarProveedor.php',
'layout'=>LAYOUT_CLIENTE
);









//MODULO DE ADUANA_LLEGADA

$conf['agregar_aduana_llegada']=array(
'archivo'=>'frmAgregar_aduana_llegada.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['guardar_aduana_llegada']=array(
'archivo'=>'guardar_aduana_llegada.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['actualizar_aduana_llegada']=array(
'archivo'=>'actualizar_aduana_llegada.php',
'layout'=>LAYOUT_CLIENTE
);


//traking
//manifiesto

$conf['contenedor']=array(
'archivo'=>'contenedor.html',
'layout'=>LAYOUT_POPUP3
);


//MODULO DE MERCADERIA

$conf['agregar_mercaderia']=array(
'archivo'=>'frmAgregarMercaderia.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['guardar_mercaderia']=array(
'archivo'=>'guardarMercaderia.php',
'layout'=>LAYOUT_CLIENTE
);

$conf['actualizar_mercaderia']=array(
'archivo'=>'actualizar_mercaderia.php',
'layout'=>LAYOUT_CLIENTE
);



?>