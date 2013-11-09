--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: backup_cliente(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION backup_cliente() RETURNS trigger
    LANGUAGE plpgsql
    AS $$BEGIN 

INSERT INTO historial_cliente values(

new.cliente_id,

new.nombre_empr,

new.giro,

new.num_reg,

new.direccion,

new.nom_represent,

new.apellido_represent,

new.telefono_represent,

new.correo,

new.comentario,

now()

);

RETURN NEW;

END;

$$;


ALTER FUNCTION public.backup_cliente() OWNER TO postgres;

--
-- Name: hist_servicio(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION hist_servicio() RETURNS trigger
    LANGUAGE plpgsql
    AS $$

BEGIN

INSERT INTO historial_servicio VALUES(

new.servicio_id,

new.fch_almac_serv,

new.fch_sal_bod_serv,

new.fch_est_llega_serv,

new.num_vuelo_serv,

new.costo_serv,

new.estado_serv,

new.fk_servi_bod,

new.fk_proveedor,

new.fk_adu_llega,

new.fk_det_flet,

new.fk_seguimiento,

new.fk_etd,

new.fk_bl,

new.fk_manifiesto,

new.fk_rol,

new.fk_det_merca,

now()

);

RETURN NEW;

END

$$;


ALTER FUNCTION public.hist_servicio() OWNER TO postgres;

--
-- Name: historial_empleado(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION historial_empleado() RETURNS trigger
    LANGUAGE plpgsql
    AS $$BEGIN 

INSERT INTO historial_empleado VALUES(

new.empleado_id,

new.nombre_epl,

new.apellido_epl,

new.direccion_epl,

new.telefono_epl,

new.correo_epl,

new.num_seguro,

new.fk_sucursal,

now()

);

RETURN NEW;

END

$$;


ALTER FUNCTION public.historial_empleado() OWNER TO postgres;

--
-- Name: update_tarifa(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION update_tarifa() RETURNS trigger
    LANGUAGE plpgsql
    AS $$BEGIN 

INSERT INTO tarifa_update VALUES(

old.cat_tarifa_id,

old.cobro_peso,

new.cobro_peso,

old.cobro_vol,

new.cobro_vol,

old.fk_cliente,

now()

);

RETURN OLD;

RETURN NEW;

END 

$$;


ALTER FUNCTION public.update_tarifa() OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: aduana_llegada; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE aduana_llegada (
    adu_llega_id integer NOT NULL,
    nombre_adu_llega character varying(45) NOT NULL,
    direccion_adu_llega character varying(45) NOT NULL,
    tipo_adu_llega character varying(45) NOT NULL,
    pais_adu_llega character varying(45) NOT NULL
);


ALTER TABLE public.aduana_llegada OWNER TO postgres;

--
-- Name: aereo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE aereo (
    aereo_id integer NOT NULL,
    num_vuelo character varying(45) NOT NULL,
    aerolinea character varying(45) NOT NULL
);


ALTER TABLE public.aereo OWNER TO postgres;

--
-- Name: agente_bodega; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE agente_bodega (
    aget_bod_id integer NOT NULL,
    nombre_aget_bod character varying(45) NOT NULL,
    direccion_aget_bod character varying(45) NOT NULL,
    nombre_repre_aget_bod character varying(45) NOT NULL,
    apellido_repre_aget_bod character varying(45) NOT NULL,
    pais_aget_bod character varying(45) NOT NULL
);


ALTER TABLE public.agente_bodega OWNER TO postgres;

--
-- Name: agente_flete; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE agente_flete (
    agent_fle_id integer NOT NULL,
    nombre_agent_fle character varying(45) NOT NULL,
    direccion_agent_fle character varying(45) NOT NULL,
    nombre_repre_agent_fle character varying(45) NOT NULL,
    apellido_repre_agent_fle character varying(45) NOT NULL,
    tel_repre_agent_fle character varying(45) NOT NULL,
    correo_repre_agent_fle character varying(45) DEFAULT NULL::character varying
);


ALTER TABLE public.agente_flete OWNER TO postgres;

--
-- Name: bl; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE bl (
    bl_id integer NOT NULL,
    num_bl character varying(45) NOT NULL
);


ALTER TABLE public.bl OWNER TO postgres;

--
-- Name: cat_mercaderia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cat_mercaderia (
    cat_merca_id integer NOT NULL,
    nombre_cat_merca character varying(45) NOT NULL,
    fch_venc_cat_merca date
);


ALTER TABLE public.cat_mercaderia OWNER TO postgres;

--
-- Name: cat_tarifa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cat_tarifa (
    cat_tarifa_id integer NOT NULL,
    cobro_peso double precision NOT NULL,
    cobro_vol double precision NOT NULL,
    fk_cliente integer
);


ALTER TABLE public.cat_tarifa OWNER TO postgres;

--
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cliente (
    cliente_id integer NOT NULL,
    nombre_empr character varying(45) NOT NULL,
    giro character varying(45) NOT NULL,
    num_reg character varying(45) NOT NULL,
    direccion character varying(45) NOT NULL,
    nom_represent character varying(45) NOT NULL,
    apellido_represent character varying(45) NOT NULL,
    telefono_represent character varying(45) NOT NULL,
    correo character varying(45),
    comentario character varying(500)
);


ALTER TABLE public.cliente OWNER TO postgres;

--
-- Name: contenedor; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE contenedor (
    contene_id integer NOT NULL,
    tamano_conte character varying(45) NOT NULL,
    numero_conte character varying(45) NOT NULL,
    sello_conte character varying(45) NOT NULL,
    fk_agent_bod integer NOT NULL
);


ALTER TABLE public.contenedor OWNER TO postgres;

--
-- Name: det_flete; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE det_flete (
    det_fle_id integer NOT NULL,
    fk_transport integer NOT NULL,
    fk_contenedor integer NOT NULL
);


ALTER TABLE public.det_flete OWNER TO postgres;

--
-- Name: det_mercaderia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE det_mercaderia (
    det_merca_id integer NOT NULL,
    cantidad_merca character varying(45) NOT NULL,
    descripcion_merca character varying(100) NOT NULL,
    peso_merca character varying NOT NULL,
    volumen_merca character varying(45) NOT NULL,
    fk_catalogo integer NOT NULL
);


ALTER TABLE public.det_mercaderia OWNER TO postgres;

--
-- Name: documento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE documento (
    document_id integer NOT NULL,
    num_doc character varying(45) NOT NULL,
    fk_tip_doc integer NOT NULL
);


ALTER TABLE public.documento OWNER TO postgres;

--
-- Name: empleado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE empleado (
    empleado_id integer NOT NULL,
    nombre_epl character varying(45) NOT NULL,
    apellido_epl character varying(45) NOT NULL,
    direccion_epl character varying(45) NOT NULL,
    telefono_epl character varying(45) NOT NULL,
    correo_epl character varying(45),
    num_seguro character varying(45),
    fk_sucursal integer NOT NULL
);


ALTER TABLE public.empleado OWNER TO postgres;

--
-- Name: etd; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE etd (
    etd_id integer NOT NULL,
    num_etd character varying(45) NOT NULL
);


ALTER TABLE public.etd OWNER TO postgres;

--
-- Name: historial_cliente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE historial_cliente (
    cliente_id integer,
    nombre_empr character varying(45),
    giro character varying(45),
    num_reg character varying(45),
    direccion character varying(45),
    nom_represent character varying(45),
    apellido_represent character varying(45),
    telefono_represent character varying(45),
    correo character varying(45),
    comentario character varying(500),
    fecha_hora character varying(60)
);


ALTER TABLE public.historial_cliente OWNER TO postgres;

--
-- Name: historial_empleado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE historial_empleado (
    empleado_id integer,
    nombre_epl character varying(45),
    apellido_epl character varying(45),
    direccion_epl character varying(45),
    telefono_epl character varying(45),
    correo_epl character varying(45),
    num_seguro character varying(45),
    fk_sucursal integer,
    fecha_hora character varying(50)
);


ALTER TABLE public.historial_empleado OWNER TO postgres;

--
-- Name: historial_servicio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE historial_servicio (
    servicio_id integer,
    fch_almac_serv date,
    fch_sal_bod_serv date,
    fch_est_llega_serv date,
    num_vuelo_serv character varying(45),
    costo_serv character varying(45),
    estado_serv character varying(45),
    fk_servi_bod integer,
    fk_proveedor integer,
    fk_adu_llega integer,
    fk_det_flet integer,
    fk_seguimiento integer,
    fk_etd integer,
    fk_bl integer,
    fk_manifiesto integer,
    fk_rol integer,
    fk_det_merca integer,
    fecha_hora character varying(50)
);


ALTER TABLE public.historial_servicio OWNER TO postgres;

--
-- Name: manifiesto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE manifiesto (
    manifiesto_id integer NOT NULL,
    num_manifiesto character varying(45) NOT NULL
);


ALTER TABLE public.manifiesto OWNER TO postgres;

--
-- Name: maritimo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE maritimo (
    maritimo_id integer NOT NULL,
    nom_barco character varying(45) NOT NULL
);


ALTER TABLE public.maritimo OWNER TO postgres;

--
-- Name: proveedor; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE proveedor (
    proveedor_id integer NOT NULL,
    nombre_prov character varying(45) NOT NULL,
    pais_prov character varying(45) NOT NULL,
    direccion character varying(45) NOT NULL,
    telefono_prov character varying(45) NOT NULL,
    correo_prov character varying(45) DEFAULT NULL::character varying
);


ALTER TABLE public.proveedor OWNER TO postgres;

--
-- Name: rol; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE rol (
    rol_id integer NOT NULL,
    nombre_rol character varying(45) NOT NULL,
    fk_tipo_rol integer NOT NULL,
    usuario character varying(45) NOT NULL,
    contrasena character varying(45) NOT NULL,
    fk_cliente integer NOT NULL,
    fk_empleado integer NOT NULL,
    fk_documento integer NOT NULL
);


ALTER TABLE public.rol OWNER TO postgres;

--
-- Name: seguimiento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE seguimiento (
    seguimiento_id integer NOT NULL
);


ALTER TABLE public.seguimiento OWNER TO postgres;

--
-- Name: servicio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE servicio (
    servicio_id integer NOT NULL,
    fch_almac_serv date NOT NULL,
    fch_sal_bod_serv date NOT NULL,
    fch_est_llega_serv date NOT NULL,
    num_vuelo_serv character varying(45) DEFAULT NULL::character varying,
    costo_serv character varying(45) NOT NULL,
    estado_serv character varying(45) NOT NULL,
    fk_servi_bod integer NOT NULL,
    fk_proveedor integer NOT NULL,
    fk_adu_llega integer NOT NULL,
    fk_det_flet integer NOT NULL,
    fk_seguimiento integer NOT NULL,
    fk_etd integer NOT NULL,
    fk_bl integer NOT NULL,
    fk_manifiesto integer NOT NULL,
    fk_rol integer NOT NULL,
    fk_det_merca integer NOT NULL
);


ALTER TABLE public.servicio OWNER TO postgres;

--
-- Name: servicio_bodega; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE servicio_bodega (
    serv_bod_id integer NOT NULL,
    nombre_serv_bod character varying(45) NOT NULL,
    precio_serv_bod double precision NOT NULL,
    fk_agente_bod integer NOT NULL
);


ALTER TABLE public.servicio_bodega OWNER TO postgres;

--
-- Name: sucursal; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE sucursal (
    sucursal_id integer NOT NULL,
    nombre_sucu character varying(45) NOT NULL,
    num_reg_sucu character varying(45) NOT NULL,
    direccion_sucu character varying(60) NOT NULL,
    telefono_sucu character varying(45) NOT NULL,
    correo_sucu character varying(45)
);


ALTER TABLE public.sucursal OWNER TO postgres;

--
-- Name: tarifa_update; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tarifa_update (
    cat_tarifa_id integer,
    cobro_peso_old double precision,
    cobro_peso_new double precision,
    cobro_vol_old double precision,
    cobro_vol_new double precision,
    fk_cliente integer,
    fecha_hora character varying
);


ALTER TABLE public.tarifa_update OWNER TO postgres;

--
-- Name: terrestre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE terrestre (
    terrestre_id integer NOT NULL,
    placa character varying(45) NOT NULL,
    nom_conductor character varying(45) NOT NULL,
    apell_conductor character varying(45) NOT NULL
);


ALTER TABLE public.terrestre OWNER TO postgres;

--
-- Name: tipo_documento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_documento (
    tipo_doc_id integer NOT NULL,
    nombre_tip_doc character varying(45) NOT NULL
);


ALTER TABLE public.tipo_documento OWNER TO postgres;

--
-- Name: tipo_rol; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_rol (
    tipo_rol_id integer NOT NULL,
    nombre_tip_rol character varying(45) NOT NULL
);


ALTER TABLE public.tipo_rol OWNER TO postgres;

--
-- Name: transporte; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE transporte (
    transp_id integer NOT NULL,
    placa_transp character varying(45) NOT NULL,
    nombre_transp character varying(45) NOT NULL,
    capacidad_transp character varying(45) NOT NULL,
    fk_maritimo integer NOT NULL,
    fk_terrestre integer NOT NULL,
    fk_aereo integer NOT NULL
);


ALTER TABLE public.transporte OWNER TO postgres;

--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    iduser integer NOT NULL,
    usuario character varying(50) NOT NULL,
    contrasena character varying(100) NOT NULL,
    tipousuario character varying(50) NOT NULL,
    estado integer NOT NULL,
    correo character varying(40) NOT NULL,
    pregunta character varying(70) NOT NULL,
    respuesta character varying(100) NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: venta; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE venta (
    venta_id integer NOT NULL,
    fch_emi_venta date NOT NULL,
    exenta_venta character varying(45) DEFAULT NULL::character varying,
    iva double precision NOT NULL,
    fk_servicio integer NOT NULL
);


ALTER TABLE public.venta OWNER TO postgres;

--
-- Data for Name: aduana_llegada; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY aduana_llegada (adu_llega_id, nombre_adu_llega, direccion_adu_llega, tipo_adu_llega, pais_adu_llega) FROM stdin;
\.


--
-- Data for Name: aereo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY aereo (aereo_id, num_vuelo, aerolinea) FROM stdin;
\.


--
-- Data for Name: agente_bodega; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY agente_bodega (aget_bod_id, nombre_aget_bod, direccion_aget_bod, nombre_repre_aget_bod, apellido_repre_aget_bod, pais_aget_bod) FROM stdin;
1	Juan Perez	Calle Chiltiupan	Manuel	Perez	El Salvador
2	erer	erer	erer	erer	erer
3	corveraaaaa diaz	tututata	45896	frffh	cesar
\.


--
-- Data for Name: agente_flete; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY agente_flete (agent_fle_id, nombre_agent_fle, direccion_agent_fle, nombre_repre_agent_fle, apellido_repre_agent_fle, tel_repre_agent_fle, correo_repre_agent_fle) FROM stdin;
\.


--
-- Data for Name: bl; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY bl (bl_id, num_bl) FROM stdin;
\.


--
-- Data for Name: cat_mercaderia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cat_mercaderia (cat_merca_id, nombre_cat_merca, fch_venc_cat_merca) FROM stdin;
\.


--
-- Data for Name: cat_tarifa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cat_tarifa (cat_tarifa_id, cobro_peso, cobro_vol, fk_cliente) FROM stdin;
1	200	300	\N
3	5696	8796	1
2	4.6666666666666696	55666	1
\.


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cliente (cliente_id, nombre_empr, giro, num_reg, direccion, nom_represent, apellido_represent, telefono_represent, correo, comentario) FROM stdin;
5	dfd	dfdf	dfdf	dfdf	dfd	fdfd	dfdf	ddfdfd	\N
1	rubenmoviles	comercial	1	colonia jackeline	Ruben	Perez guzman	22767798	rperez_s@hotmail.com	lololol
3	cesar lara	nada	3	san salvador 	cesar alfredo	ramos	435345264256	luis@hotmail.com	prueba2
2	catdogssssssssssss	comercial	2	colonia las margaritas	Luis 	Corvera	22789863	luis_corvera	ppppppp
4	melissay	de cargassssssss	7777777777	san salvador 	luis enrique	diaz melendez	9999999999	meliza@hotmail.com	prueba prueba 
\.


--
-- Data for Name: contenedor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY contenedor (contene_id, tamano_conte, numero_conte, sello_conte, fk_agent_bod) FROM stdin;
21	123	980	Prueba	1
1	asdasdasdsa	sfsdfsdf	corvera	1
2	rrrrrrrrrr	rrrrrrrrrrrrrrr	rrrrrrrrrrrrr	1
6	25255	23525	2222222222222222	1
12	ljkjl	xxxxxxxx	sdasd	1
\.


--
-- Data for Name: det_flete; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY det_flete (det_fle_id, fk_transport, fk_contenedor) FROM stdin;
\.


--
-- Data for Name: det_mercaderia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY det_mercaderia (det_merca_id, cantidad_merca, descripcion_merca, peso_merca, volumen_merca, fk_catalogo) FROM stdin;
\.


--
-- Data for Name: documento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY documento (document_id, num_doc, fk_tip_doc) FROM stdin;
\.


--
-- Data for Name: empleado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY empleado (empleado_id, nombre_epl, apellido_epl, direccion_epl, telefono_epl, correo_epl, num_seguro, fk_sucursal) FROM stdin;
1	Luis	Corvera	las amapolas	22568774	lolo@hotmail.com	123456	1
2	Steve	Mendez	los cocos	25456986	jajajajaa@hotmail.com	89756999999999	1
\.


--
-- Data for Name: etd; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY etd (etd_id, num_etd) FROM stdin;
\.


--
-- Data for Name: historial_cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY historial_cliente (cliente_id, nombre_empr, giro, num_reg, direccion, nom_represent, apellido_represent, telefono_represent, correo, comentario, fecha_hora) FROM stdin;
1	rubenmoviles	comercial	1	colonia jackeline	Ruben	Perez 	22767798	rperez_s@hotmail.com	lololol	\N
2	catdog	comercial	2	colonia las margaritas	Luis 	Corvera	22789863	luis_corvera	ppppppp	\N
3	cesar	nada	3	san salvador 	cesar alfredo	ramos	435345264256	luis@hotmail.com	prueba2	\N
4	melissa	de carga	324353t	san miguel	luis	diaz	3245363636	meli@hotmail.com	prueba prueba 	2013-10-01 10:10:02.01-06
5	dfd	dfdf	dfdf	dfdf	dfd	fdfd	dfdf	ddfdfd	\N	2013-10-02 04:35:17.057-06
\.


--
-- Data for Name: historial_empleado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY historial_empleado (empleado_id, nombre_epl, apellido_epl, direccion_epl, telefono_epl, correo_epl, num_seguro, fk_sucursal, fecha_hora) FROM stdin;
1	Luis	Corvera	las amapolas	22568774	lolo@hotmail.com	123456	1	2013-10-02 17:40:43.986-06
2	Steve	Mendez	los cocos	25456986	jajajajaa@hotmail.com	89756	1	2013-10-02 17:41:36.012-06
\.


--
-- Data for Name: historial_servicio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY historial_servicio (servicio_id, fch_almac_serv, fch_sal_bod_serv, fch_est_llega_serv, num_vuelo_serv, costo_serv, estado_serv, fk_servi_bod, fk_proveedor, fk_adu_llega, fk_det_flet, fk_seguimiento, fk_etd, fk_bl, fk_manifiesto, fk_rol, fk_det_merca, fecha_hora) FROM stdin;
\.


--
-- Data for Name: manifiesto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY manifiesto (manifiesto_id, num_manifiesto) FROM stdin;
\.


--
-- Data for Name: maritimo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY maritimo (maritimo_id, nom_barco) FROM stdin;
\.


--
-- Data for Name: proveedor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY proveedor (proveedor_id, nombre_prov, pais_prov, direccion, telefono_prov, correo_prov) FROM stdin;
\.


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY rol (rol_id, nombre_rol, fk_tipo_rol, usuario, contrasena, fk_cliente, fk_empleado, fk_documento) FROM stdin;
\.


--
-- Data for Name: seguimiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY seguimiento (seguimiento_id) FROM stdin;
\.


--
-- Data for Name: servicio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY servicio (servicio_id, fch_almac_serv, fch_sal_bod_serv, fch_est_llega_serv, num_vuelo_serv, costo_serv, estado_serv, fk_servi_bod, fk_proveedor, fk_adu_llega, fk_det_flet, fk_seguimiento, fk_etd, fk_bl, fk_manifiesto, fk_rol, fk_det_merca) FROM stdin;
\.


--
-- Data for Name: servicio_bodega; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY servicio_bodega (serv_bod_id, nombre_serv_bod, precio_serv_bod, fk_agente_bod) FROM stdin;
1	burbujutas	100	1
2	xxxxxxxxx	777	1
\.


--
-- Data for Name: sucursal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sucursal (sucursal_id, nombre_sucu, num_reg_sucu, direccion_sucu, telefono_sucu, correo_sucu) FROM stdin;
1	Campos	12345	calle los naranjos	22767798	ty@hotmail.com
\.


--
-- Data for Name: tarifa_update; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tarifa_update (cat_tarifa_id, cobro_peso_old, cobro_peso_new, cobro_vol_old, cobro_vol_new, fk_cliente, fecha_hora) FROM stdin;
2	46546	46	46466	55666	4	2013-10-01 11:08:48.684-06
2	46	466666666666666690	55666	55666	4	2013-10-02 17:44:33.925-06
2	466666666666666690	4.6666666666666696	55666	55666	1	2013-10-02 17:45:15.148-06
\.


--
-- Data for Name: terrestre; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY terrestre (terrestre_id, placa, nom_conductor, apell_conductor) FROM stdin;
\.


--
-- Data for Name: tipo_documento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipo_documento (tipo_doc_id, nombre_tip_doc) FROM stdin;
\.


--
-- Data for Name: tipo_rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipo_rol (tipo_rol_id, nombre_tip_rol) FROM stdin;
\.


--
-- Data for Name: transporte; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY transporte (transp_id, placa_transp, nombre_transp, capacidad_transp, fk_maritimo, fk_terrestre, fk_aereo) FROM stdin;
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuario (iduser, usuario, contrasena, tipousuario, estado, correo, pregunta, respuesta) FROM stdin;
1	admin	1234	Administrador	1	lec92@hotmail.com	cual es tu comida favorita	pollo
2	lec92	1234	usuario	1	luis@hotmail.com	comida preferida?	pollo
\.


--
-- Data for Name: venta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY venta (venta_id, fch_emi_venta, exenta_venta, iva, fk_servicio) FROM stdin;
\.


--
-- Name: aduana_llegada_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY aduana_llegada
    ADD CONSTRAINT aduana_llegada_pkey PRIMARY KEY (adu_llega_id);


--
-- Name: aereo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY aereo
    ADD CONSTRAINT aereo_pkey PRIMARY KEY (aereo_id);


--
-- Name: agente_bodega_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY agente_bodega
    ADD CONSTRAINT agente_bodega_pkey PRIMARY KEY (aget_bod_id);


--
-- Name: agente_flete_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY agente_flete
    ADD CONSTRAINT agente_flete_pkey PRIMARY KEY (agent_fle_id);


--
-- Name: bl_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY bl
    ADD CONSTRAINT bl_pkey PRIMARY KEY (bl_id);


--
-- Name: cat_mercaderia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cat_mercaderia
    ADD CONSTRAINT cat_mercaderia_pkey PRIMARY KEY (cat_merca_id);


--
-- Name: cat_tarifa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cat_tarifa
    ADD CONSTRAINT cat_tarifa_pkey PRIMARY KEY (cat_tarifa_id);


--
-- Name: cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (cliente_id);


--
-- Name: contenedor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contenedor
    ADD CONSTRAINT contenedor_pkey PRIMARY KEY (contene_id);


--
-- Name: det_flete_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY det_flete
    ADD CONSTRAINT det_flete_pkey PRIMARY KEY (det_fle_id);


--
-- Name: det_mercaderia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY det_mercaderia
    ADD CONSTRAINT det_mercaderia_pkey PRIMARY KEY (det_merca_id);


--
-- Name: documento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY documento
    ADD CONSTRAINT documento_pkey PRIMARY KEY (document_id);


--
-- Name: empleado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (empleado_id);


--
-- Name: etd_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY etd
    ADD CONSTRAINT etd_pkey PRIMARY KEY (etd_id);


--
-- Name: manifiesto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY manifiesto
    ADD CONSTRAINT manifiesto_pkey PRIMARY KEY (manifiesto_id);


--
-- Name: maritimo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY maritimo
    ADD CONSTRAINT maritimo_pkey PRIMARY KEY (maritimo_id);


--
-- Name: proveedor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (proveedor_id);


--
-- Name: rol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (rol_id);


--
-- Name: seguimiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY seguimiento
    ADD CONSTRAINT seguimiento_pkey PRIMARY KEY (seguimiento_id);


--
-- Name: servicio_bodega_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY servicio_bodega
    ADD CONSTRAINT servicio_bodega_pkey PRIMARY KEY (serv_bod_id);


--
-- Name: servicio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT servicio_pkey PRIMARY KEY (servicio_id);


--
-- Name: sucursal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sucursal
    ADD CONSTRAINT sucursal_pkey PRIMARY KEY (sucursal_id);


--
-- Name: terrestre_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY terrestre
    ADD CONSTRAINT terrestre_pkey PRIMARY KEY (terrestre_id);


--
-- Name: tipo_documento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_documento
    ADD CONSTRAINT tipo_documento_pkey PRIMARY KEY (tipo_doc_id);


--
-- Name: tipo_rol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_rol
    ADD CONSTRAINT tipo_rol_pkey PRIMARY KEY (tipo_rol_id);


--
-- Name: transporte_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_pkey PRIMARY KEY (transp_id);


--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (iduser);


--
-- Name: venta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY venta
    ADD CONSTRAINT venta_pkey PRIMARY KEY (venta_id);


--
-- Name: tri_backp_emp; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER tri_backp_emp AFTER INSERT ON empleado FOR EACH ROW EXECUTE PROCEDURE historial_empleado();


--
-- Name: tri_hist_serv; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER tri_hist_serv AFTER INSERT ON servicio FOR EACH ROW EXECUTE PROCEDURE hist_servicio();


--
-- Name: tri_tarifa_update; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER tri_tarifa_update AFTER UPDATE ON cat_tarifa FOR EACH ROW EXECUTE PROCEDURE update_tarifa();


--
-- Name: trig_backup_client; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER trig_backup_client AFTER INSERT ON cliente FOR EACH ROW EXECUTE PROCEDURE backup_cliente();


--
-- Name: fk_adu_llega; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_adu_llega FOREIGN KEY (fk_adu_llega) REFERENCES aduana_llegada(adu_llega_id);


--
-- Name: fk_aereo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT fk_aereo FOREIGN KEY (fk_aereo) REFERENCES aereo(aereo_id);


--
-- Name: fk_agent_bod; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contenedor
    ADD CONSTRAINT fk_agent_bod FOREIGN KEY (fk_agent_bod) REFERENCES agente_bodega(aget_bod_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_agente_bod; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio_bodega
    ADD CONSTRAINT fk_agente_bod FOREIGN KEY (fk_agente_bod) REFERENCES agente_bodega(aget_bod_id);


--
-- Name: fk_bl; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_bl FOREIGN KEY (fk_bl) REFERENCES bl(bl_id);


--
-- Name: fk_catalogo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY det_mercaderia
    ADD CONSTRAINT fk_catalogo FOREIGN KEY (fk_catalogo) REFERENCES cat_mercaderia(cat_merca_id);


--
-- Name: fk_cliente; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT fk_cliente FOREIGN KEY (fk_cliente) REFERENCES cliente(cliente_id);


--
-- Name: fk_cliente; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cat_tarifa
    ADD CONSTRAINT fk_cliente FOREIGN KEY (fk_cliente) REFERENCES cliente(cliente_id);


--
-- Name: fk_contenedor; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY det_flete
    ADD CONSTRAINT fk_contenedor FOREIGN KEY (fk_contenedor) REFERENCES contenedor(contene_id);


--
-- Name: fk_det_flet; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_det_flet FOREIGN KEY (fk_det_flet) REFERENCES det_flete(det_fle_id);


--
-- Name: fk_det_merca; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_det_merca FOREIGN KEY (fk_det_merca) REFERENCES det_mercaderia(det_merca_id);


--
-- Name: fk_documento; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT fk_documento FOREIGN KEY (fk_documento) REFERENCES documento(document_id);


--
-- Name: fk_empleado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT fk_empleado FOREIGN KEY (fk_empleado) REFERENCES empleado(empleado_id);


--
-- Name: fk_etd; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_etd FOREIGN KEY (fk_etd) REFERENCES etd(etd_id);


--
-- Name: fk_manifiesto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_manifiesto FOREIGN KEY (fk_manifiesto) REFERENCES manifiesto(manifiesto_id);


--
-- Name: fk_maritimo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT fk_maritimo FOREIGN KEY (fk_maritimo) REFERENCES maritimo(maritimo_id);


--
-- Name: fk_proveedor; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_proveedor FOREIGN KEY (fk_proveedor) REFERENCES proveedor(proveedor_id);


--
-- Name: fk_rol; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_rol FOREIGN KEY (fk_rol) REFERENCES rol(rol_id);


--
-- Name: fk_seguimiento; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_seguimiento FOREIGN KEY (fk_seguimiento) REFERENCES seguimiento(seguimiento_id);


--
-- Name: fk_servi_bod; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY servicio
    ADD CONSTRAINT fk_servi_bod FOREIGN KEY (fk_servi_bod) REFERENCES servicio_bodega(serv_bod_id);


--
-- Name: fk_servicio; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta
    ADD CONSTRAINT fk_servicio FOREIGN KEY (fk_servicio) REFERENCES servicio(servicio_id);


--
-- Name: fk_sucursal; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY empleado
    ADD CONSTRAINT fk_sucursal FOREIGN KEY (fk_sucursal) REFERENCES sucursal(sucursal_id);


--
-- Name: fk_terrestre; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT fk_terrestre FOREIGN KEY (fk_terrestre) REFERENCES terrestre(terrestre_id);


--
-- Name: fk_tip_doc; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY documento
    ADD CONSTRAINT fk_tip_doc FOREIGN KEY (fk_tip_doc) REFERENCES tipo_documento(tipo_doc_id);


--
-- Name: fk_tipo_rol; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT fk_tipo_rol FOREIGN KEY (fk_tipo_rol) REFERENCES tipo_rol(tipo_rol_id);


--
-- Name: fk_transport; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY det_flete
    ADD CONSTRAINT fk_transport FOREIGN KEY (fk_transport) REFERENCES transporte(transp_id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

