/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     08-03-2011 0:34:23                           */
/*==============================================================*/


drop table if exists AREAS;

drop table if exists ASIGNA;

drop table if exists ASOCIADO;

drop table if exists BODEGAS;

drop table if exists CIUDADES;

drop table if exists CONTIENE;

drop table if exists CUSTODIAS;

drop table if exists DEPARTAMENTOS;

drop table if exists DIRECCIONES;

drop table if exists DOCUMENTOS;

drop table if exists EJECUTA;

drop table if exists ES_RETIRADO;

drop table if exists LOGS;

drop table if exists MATERIALES;

drop table if exists MERMAS;

drop table if exists OBRAS;

drop table if exists ORDENCOMPRA;

drop table if exists PROVEEDORES;

drop table if exists REGIONES;

drop table if exists RETIROS;

drop table if exists RETIROS_CUSTODIA;

drop table if exists SALDOS;

drop table if exists SE_GUARDAN;

drop table if exists STOCK;

drop table if exists TIPOS_OBRAS;

drop table if exists TRASPASOS;

drop table if exists UNIDADES;

drop table if exists USUARIOS;

/*==============================================================*/
/* Table: AREAS                                                 */
/*==============================================================*/
create table AREAS
(
   ID_AREA              int not null auto_increment,
   ID_BODEGA            int not null,
   NOMBRE_AREA          varchar(100),
   primary key (ID_AREA, ID_BODEGA)
);

/*==============================================================*/
/* Table: ASIGNA                                                */
/*==============================================================*/
create table ASIGNA
(
   ID_OBRA              int not null,
   ID_AREA              int not null,
   ID_BODEGA            int not null,
   FECHA_ASIGNA         date not null,
   primary key (ID_OBRA, ID_AREA, ID_BODEGA, FECHA_ASIGNA)
);

/*==============================================================*/
/* Table: ASOCIADO                                              */
/*==============================================================*/
create table ASOCIADO
(
   ID_CUSTODIA          int not null,
   ID_MATERIAL          int not null,
   ID_AREA              int not null,
   ID_BODEGA            int not null,
   ID_UNIDAD            int not null,
   FOLIO_ASOCIADO       int,
   PERIODO_ASOCIADO     int not null,
   ESTADO_ASOCIADO      int,
   ESTADO_RETIRO_ASOCIADO int,
   primary key (ID_CUSTODIA, ID_MATERIAL, ID_AREA, ID_BODEGA, ID_UNIDAD, PERIODO_ASOCIADO)
);

/*==============================================================*/
/* Table: BODEGAS                                               */
/*==============================================================*/
create table BODEGAS
(
   ID_BODEGA            int not null auto_increment,
   NOMBRE_BODEGA        varchar(100),
   primary key (ID_BODEGA)
);

/*==============================================================*/
/* Table: CIUDADES                                              */
/*==============================================================*/
create table CIUDADES
(
   ID_CIUDAD            int not null auto_increment,
   NOMBRE_CIUDAD        varchar(100),
   ID_REGION            int not null,
   primary key (ID_CIUDAD)
);

/*==============================================================*/
/* Table: CONTIENE                                              */
/*==============================================================*/
create table CONTIENE
(
   ID_MATERIAL          int not null,
   NUMERO_OC            varchar(100) not null,
   ID_DOCUMENTO         int not null,
   RUT_PROVEEDOR        varchar(12) not null,
   ID_OBRA              int not null,
   FOLIO_CONTIENE       int not null,
   CANTIDADTOTAL_CONTIENE int,
   CANTIDADBODEGA_CONTIENE int,
   CANTIDADRECIBIDA_CONTIENE int,
   VALOR_CONTIENE       int,
   FECHA_CONTIENE       datetime,
   primary key (ID_MATERIAL, NUMERO_OC, ID_DOCUMENTO, RUT_PROVEEDOR, ID_OBRA, FOLIO_CONTIENE)
);

/*==============================================================*/
/* Table: CUSTODIAS                                             */
/*==============================================================*/
create table CUSTODIAS
(
   ID_CUSTODIA          int not null auto_increment,
   INGRESADOPOR_CUSTODIA varchar(100),
   FECHAINGRESO_CUSTODIA date,
   TIPO_CUSTODIA        varchar(100),
   COMENTARIOS_CUSTODIA text,
   RESERVA_CUSTODIA     int,
   primary key (ID_CUSTODIA)
);

/*==============================================================*/
/* Table: DEPARTAMENTOS                                         */
/*==============================================================*/
create table DEPARTAMENTOS
(
   ID_DEPARTAMENTO      int not null auto_increment,
   ID_DIRECCION         int not null,
   NOMBRE_DEPARTAMENTO  varchar(100),
   primary key (ID_DEPARTAMENTO)
);

/*==============================================================*/
/* Table: DIRECCIONES                                           */
/*==============================================================*/
create table DIRECCIONES
(
   ID_DIRECCION         int not null auto_increment,
   NOMBRE_DIRECCION     varchar(100),
   primary key (ID_DIRECCION)
);

/*==============================================================*/
/* Table: DOCUMENTOS                                            */
/*==============================================================*/
create table DOCUMENTOS
(
   ID_DOCUMENTO         int not null auto_increment,
   NUMERO_DOCUMENTO     varchar(100),
   TIPO_DOCUMENTO       varchar(100),
   FECHA_DOCUMENTO      date,
   OBSERVACION_DOCUMENTO text,
   primary key (ID_DOCUMENTO)
);

/*==============================================================*/
/* Table: EJECUTA                                               */
/*==============================================================*/
create table EJECUTA
(
   ID_RETIRO            int not null,
   ID_MATERIAL          int not null,
   ID_UNIDAD            int not null,
   FOLIO_EJECUTA        int not null,
   FECHA_EJECUTA        datetime,
   CANTIDAD_EJECUTA     int,
   primary key (ID_RETIRO, ID_MATERIAL, ID_UNIDAD, FOLIO_EJECUTA)
);

/*==============================================================*/
/* Table: ES_RETIRADO                                           */
/*==============================================================*/
create table ES_RETIRADO
(
   ID_MATERIAL          int not null,
   ID_RETIRO_CUSTODIA   int not null,
   FOLIO_ES_RETIRADO    int,
   FECHA_ES_RETIRADO    datetime,
   primary key (ID_MATERIAL, ID_RETIRO_CUSTODIA)
);

/*==============================================================*/
/* Table: LOGS                                                  */
/*==============================================================*/
create table LOGS
(
   ID_LOG               int not null,
   ID_USUARIO           int not null,
   ACCION_LOG           text,
   FECHA_LOG            datetime,
   primary key (ID_LOG)
);

/*==============================================================*/
/* Table: MATERIALES                                            */
/*==============================================================*/
create table MATERIALES
(
   ID_MATERIAL          int not null auto_increment,
   NOMBRE_MATERIAL      varchar(100),
   ESTADO_MATERIAL      int,
   UNIDADMEDIDA_MATERIAL varchar(100),
   primary key (ID_MATERIAL)
);

/*==============================================================*/
/* Table: MERMAS                                                */
/*==============================================================*/
create table MERMAS
(
   ID_MERMA             int not null auto_increment,
   ID_AREA              int not null,
   ID_BODEGA            int,
   ID_MATERIAL          int not null,
   ID_OBRA              int not null,
   OBERVACION_MERMA     text,
   CANTIDAD_MERMA       int,
   FECHA_MERMA          datetime,
   primary key (ID_MERMA)
);

/*==============================================================*/
/* Table: OBRAS                                                 */
/*==============================================================*/
create table OBRAS
(
   ID_OBRA              int not null auto_increment,
   ID_TIPO_OBRA         int not null,
   ID_DEPARTAMENTO      int not null,
   NOMBRE_OBRA          varchar(100) not null,
   ENCARGADO_OBRA       varchar(100) not null,
   ESTADO_OBRA          int,
   FECHA_INICIO_OBRA    date,
   FECHA_TERMINO_OBRA   date,
   COMENTARIO_OBRA      text,
   primary key (ID_OBRA)
);

/*==============================================================*/
/* Table: ORDENCOMPRA                                           */
/*==============================================================*/
create table ORDENCOMPRA
(
   NUMERO_OC            varchar(100) not null,
   ID_UNIDAD            int not null,
   FECHA_OC             date,
   FECHATOPE_OC         date,
   FECHAINGRESO_OC      datetime,
   SOLICITANTE_OC       varchar(100),
   OBSERVACION_OC       text,
   ESTADO_OC            varchar(100),
   NETO_OC              int,
   TOTAL_OC             int,
   primary key (NUMERO_OC)
);

/*==============================================================*/
/* Table: PROVEEDORES                                           */
/*==============================================================*/
create table PROVEEDORES
(
   RUT_PROVEEDOR        varchar(12) not null,
   ID_CIUDAD            int not null,
   NOMBRE_PROVEEDOR     varchar(100),
   DIRECCION_PROVEEDOR  varchar(100),
   CONTACTO_PROVEEDOR   varchar(100),
   FONO_PROVEEDOR       varchar(100),
   primary key (RUT_PROVEEDOR)
);

/*==============================================================*/
/* Table: REGIONES                                              */
/*==============================================================*/
create table REGIONES
(
   ID_REGION            int not null auto_increment,
   NOMBRE_REGION        varchar(100),
   primary key (ID_REGION)
);

/*==============================================================*/
/* Table: RETIROS                                               */
/*==============================================================*/
create table RETIROS
(
   ID_RETIRO            int not null auto_increment,
   PERSONA_RETIRO       varchar(100),
   MOTIVO_RETIRO        text,
   ESTADO_RETIRO        int,
   primary key (ID_RETIRO)
);

/*==============================================================*/
/* Table: RETIROS_CUSTODIA                                      */
/*==============================================================*/
create table RETIROS_CUSTODIA
(
   ID_RETIRO_CUSTODIA   int not null auto_increment,
   NOMBRE_RETIRO_CUSTODIA varchar(100),
   OBSERVACION_RETIRO_CUSTODIA text,
   primary key (ID_RETIRO_CUSTODIA)
);

/*==============================================================*/
/* Table: SALDOS                                                */
/*==============================================================*/
create table SALDOS
(
   ID_SALDO             int not null auto_increment,
   OBSERVACION_SALDO    text,
   primary key (ID_SALDO)
);

/*==============================================================*/
/* Table: SE_GUARDAN                                            */
/*==============================================================*/
create table SE_GUARDAN
(
   ID_AREA              int not null,
   ID_BODEGA            int not null,
   ID_SALDO             int not null,
   ID_MATERIAL          int not null,
   FECHA_SEGUARDAN      date not null,
   CANTIDAD_SEGUARDAN   int not null,
   primary key (ID_AREA, ID_BODEGA, ID_SALDO, ID_MATERIAL, FECHA_SEGUARDAN)
);

/*==============================================================*/
/* Table: STOCK                                                 */
/*==============================================================*/
create table STOCK
(
   ID_STOCK_MATERIAL    int not null auto_increment,
   PRECIO_STOCK         int,
   FECHAPRECIO_STOCK    date,
   CANTIDAD_STOCK       int,
   MINIMO_STOCK         int,
   primary key (ID_STOCK_MATERIAL)
);

/*==============================================================*/
/* Table: TIPOS_OBRAS                                           */
/*==============================================================*/
create table TIPOS_OBRAS
(
   ID_TIPO_OBRA         int not null auto_increment,
   CODIGO_TIPO_OBRA     varchar(100),
   NOMBRE_TIPO_OBRA     varchar(100),
   primary key (ID_TIPO_OBRA)
);

/*==============================================================*/
/* Table: TRASPASOS                                             */
/*==============================================================*/
create table TRASPASOS
(
   ID_TRASPASO          int not null auto_increment,
   ID_OBRA              int not null,
   ID_MATERIAL          int not null,
   ID_AREA              int,
   ID_BODEGA            int,
   TIPO_TRASPASO        int,
   FECHA_TRASPASO       datetime,
   OBSERVACION_TRASPASO text,
   CANTIDAD_TRASPASO    datetime,
   primary key (ID_TRASPASO)
);

/*==============================================================*/
/* Table: UNIDADES                                              */
/*==============================================================*/
create table UNIDADES
(
   ID_UNIDAD            int not null auto_increment,
   ID_DEPARTAMENTO      int not null,
   NOMBRE_UNIDAD        varchar(100),
   primary key (ID_UNIDAD)
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS
(
   ID_USUARIO           int not null auto_increment,
   ID_DEPARTAMENTO      int not null,
   RUT_USUARIO          varchar(10),
   NOMBRE_USUARIO       varchar(100),
   APELLIDOS_USUARIO    varchar(100),
   PASSWORD_USUARIO     varchar(100),
   ESTADO_USUARIO       int,
   primary key (ID_USUARIO)
);

alter table AREAS add constraint FK_EXISTEN foreign key (ID_BODEGA)
      references BODEGAS (ID_BODEGA) on delete restrict on update restrict;

alter table ASIGNA add constraint FK_ASIGNA foreign key (ID_OBRA)
      references OBRAS (ID_OBRA) on delete restrict on update restrict;

alter table ASIGNA add constraint FK_ASIGNA2 foreign key (ID_AREA, ID_BODEGA)
      references AREAS (ID_AREA, ID_BODEGA) on delete restrict on update restrict;

alter table ASOCIADO add constraint FK_ASOCIADO foreign key (ID_CUSTODIA)
      references CUSTODIAS (ID_CUSTODIA) on delete restrict on update restrict;

alter table ASOCIADO add constraint FK_ASOCIADO2 foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table ASOCIADO add constraint FK_ASOCIADO3 foreign key (ID_AREA, ID_BODEGA)
      references AREAS (ID_AREA, ID_BODEGA) on delete restrict on update restrict;

alter table ASOCIADO add constraint FK_ASOCIADO4 foreign key (ID_UNIDAD)
      references UNIDADES (ID_UNIDAD) on delete restrict on update restrict;

alter table CIUDADES add constraint FK_SE_ENCUENTRAN foreign key (ID_REGION)
      references REGIONES (ID_REGION) on delete restrict on update restrict;

alter table CONTIENE add constraint FK_CONTIENE foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table CONTIENE add constraint FK_CONTIENE2 foreign key (NUMERO_OC)
      references ORDENCOMPRA (NUMERO_OC) on delete restrict on update restrict;

alter table CONTIENE add constraint FK_CONTIENE3 foreign key (ID_DOCUMENTO)
      references DOCUMENTOS (ID_DOCUMENTO) on delete restrict on update restrict;

alter table CONTIENE add constraint FK_CONTIENE4 foreign key (RUT_PROVEEDOR)
      references PROVEEDORES (RUT_PROVEEDOR) on delete restrict on update restrict;

alter table CONTIENE add constraint FK_CONTIENE5 foreign key (ID_OBRA)
      references OBRAS (ID_OBRA) on delete restrict on update restrict;

alter table DEPARTAMENTOS add constraint FK_PERTENECEN foreign key (ID_DIRECCION)
      references DIRECCIONES (ID_DIRECCION) on delete restrict on update restrict;

alter table EJECUTA add constraint FK_EJECUTA foreign key (ID_RETIRO)
      references RETIROS (ID_RETIRO) on delete restrict on update restrict;

alter table EJECUTA add constraint FK_EJECUTA2 foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table EJECUTA add constraint FK_EJECUTA3 foreign key (ID_UNIDAD)
      references UNIDADES (ID_UNIDAD) on delete restrict on update restrict;

alter table ES_RETIRADO add constraint FK_ES_RETIRADO foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table ES_RETIRADO add constraint FK_ES_RETIRADO2 foreign key (ID_RETIRO_CUSTODIA)
      references RETIROS_CUSTODIA (ID_RETIRO_CUSTODIA) on delete restrict on update restrict;

alter table LOGS add constraint FK_SE_REGISTRAN foreign key (ID_USUARIO)
      references USUARIOS (ID_USUARIO) on delete restrict on update restrict;

alter table MERMAS add constraint FK_MERMAS_01 foreign key (ID_AREA, ID_BODEGA)
      references AREAS (ID_AREA, ID_BODEGA) on delete restrict on update restrict;

alter table MERMAS add constraint FK_MERMAS_02 foreign key (ID_OBRA)
      references OBRAS (ID_OBRA) on delete restrict on update restrict;

alter table MERMAS add constraint FK_MERMAS_03 foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table OBRAS add constraint FK_ES_DEL foreign key (ID_TIPO_OBRA)
      references TIPOS_OBRAS (ID_TIPO_OBRA) on delete restrict on update restrict;

alter table OBRAS add constraint FK_MANEJAN foreign key (ID_DEPARTAMENTO)
      references DEPARTAMENTOS (ID_DEPARTAMENTO) on delete restrict on update restrict;

alter table ORDENCOMPRA add constraint FK_SE_ASOCIAN foreign key (ID_UNIDAD)
      references UNIDADES (ID_UNIDAD) on delete restrict on update restrict;

alter table PROVEEDORES add constraint FK_RESIDE foreign key (ID_CIUDAD)
      references CIUDADES (ID_CIUDAD) on delete restrict on update restrict;

alter table SE_GUARDAN add constraint FK_SE_GUARDAN foreign key (ID_AREA, ID_BODEGA)
      references AREAS (ID_AREA, ID_BODEGA) on delete restrict on update restrict;

alter table SE_GUARDAN add constraint FK_SE_GUARDAN2 foreign key (ID_SALDO)
      references SALDOS (ID_SALDO) on delete restrict on update restrict;

alter table SE_GUARDAN add constraint FK_SE_GUARDAN3 foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table TRASPASOS add constraint FK_TRASPASO_01 foreign key (ID_AREA, ID_BODEGA)
      references AREAS (ID_AREA, ID_BODEGA) on delete restrict on update restrict;

alter table TRASPASOS add constraint FK_TRASPASO_02 foreign key (ID_OBRA)
      references OBRAS (ID_OBRA) on delete restrict on update restrict;

alter table TRASPASOS add constraint FK_TRASPASO_03 foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table UNIDADES add constraint FK_SE_COMPONE foreign key (ID_DEPARTAMENTO)
      references DEPARTAMENTOS (ID_DEPARTAMENTO) on delete restrict on update restrict;

alter table USUARIOS add constraint FK_TRABAJA foreign key (ID_DEPARTAMENTO)
      references DEPARTAMENTOS (ID_DEPARTAMENTO) on delete restrict on update restrict;

