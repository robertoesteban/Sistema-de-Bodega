/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     09-02-2011 10:50:14                          */
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

drop table if exists MATERIALES;

drop table if exists OBRAS;

drop table if exists ORDENCOMPRA;

drop table if exists PROVEEDORES;

drop table if exists RETIROS;

drop table if exists RETIROS_CUSTODIA;

drop table if exists SALDOS;

drop table if exists SE_EJECUTA;

drop table if exists SE_GUARDAN;

drop table if exists STOCK;

drop table if exists TIPOS_OBRAS;

drop table if exists UNIDADES;

drop table if exists USUARIOS;

/*==============================================================*/
/* Table: AREAS                                                 */
/*==============================================================*/
create table AREAS
(
   ID_AREA              int not null auto_increment,
   ID_BODEGA            int not null,
   NOMBRE_AREA          varchar(50),
   primary key (ID_AREA)
);

/*==============================================================*/
/* Table: ASIGNA                                                */
/*==============================================================*/
create table ASIGNA
(
   ID_OBRA              int not null,
   ID_MATERIAL          int not null,
   ID_AREA              int not null,
   FECHA_ASIGNA         date not null,
   primary key (ID_OBRA, ID_MATERIAL, ID_AREA, FECHA_ASIGNA)
);

/*==============================================================*/
/* Table: ASOCIADO                                              */
/*==============================================================*/
create table ASOCIADO
(
   ID_CUSTODIA          int not null,
   ID_MATERIAL          int not null,
   ID_AREA              int not null,
   ID_UNIDAD            int not null,
   PERIODO_ASOCIADO     int,
   ESTADO_ASOCIADO      int,
   ESTADO_RETIRO_ASOCIADO int,
   primary key (ID_CUSTODIA, ID_MATERIAL, ID_AREA, ID_UNIDAD)
);

/*==============================================================*/
/* Table: BODEGAS                                               */
/*==============================================================*/
create table BODEGAS
(
   ID_BODEGA            int not null auto_increment,
   NOMBRE_BODEGA        varchar(50),
   primary key (ID_BODEGA)
);

/*==============================================================*/
/* Table: CIUDADES                                              */
/*==============================================================*/
create table CIUDADES
(
   ID_CIUDAD            int not null,
   NOMBRE_CIUDAD        varchar(50),
   primary key (ID_CIUDAD)
);

/*==============================================================*/
/* Table: CONTIENE                                              */
/*==============================================================*/
create table CONTIENE
(
   ID_MATERIAL          int not null,
   NUMERO_OC            char(20) not null,
   ID_DOCUMENTO         char(50) not null,
   RUT_PROVEEDOR        char(12) not null,
   CANTIDADTOTAL_CONTIENE int,
   CANTIDADBODEGA_CONTIENE int,
   CANTIDADRECIBIDA_CONTIENE int,
   VALOR_CONTIENE       int,
   primary key (ID_MATERIAL, NUMERO_OC, ID_DOCUMENTO, RUT_PROVEEDOR)
);

/*==============================================================*/
/* Table: CUSTODIAS                                             */
/*==============================================================*/
create table CUSTODIAS
(
   ID_CUSTODIA          int not null auto_increment,
   INGRESADOPOR_CUSTODIA varchar(50),
   FECHAINGRESO_CUSTODIA date,
   TIPO_CUSTODIA        varchar(50),
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
   NOMBRE_DEPARTAMENTO  varchar(50),
   primary key (ID_DEPARTAMENTO)
);

/*==============================================================*/
/* Table: DIRECCIONES                                           */
/*==============================================================*/
create table DIRECCIONES
(
   ID_DIRECCION         int not null auto_increment,
   NOMBRE_DIRECCION     varchar(50),
   primary key (ID_DIRECCION)
);

/*==============================================================*/
/* Table: DOCUMENTOS                                            */
/*==============================================================*/
create table DOCUMENTOS
(
   ID_DOCUMENTO         char(50) not null,
   NUMERO_DOCUMENTO     int,
   TIPO_DOCUMENTO       varchar(50),
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
   FECHA_EJECUTA        datetime,
   CANTIDAD_EJECUTA     int,
   primary key (ID_RETIRO, ID_MATERIAL, ID_UNIDAD)
);

/*==============================================================*/
/* Table: ES_RETIRADO                                           */
/*==============================================================*/
create table ES_RETIRADO
(
   ID_MATERIAL          int not null,
   ID_RETIRO_CUSTODIA   int not null,
   primary key (ID_MATERIAL, ID_RETIRO_CUSTODIA)
);

/*==============================================================*/
/* Table: MATERIALES                                            */
/*==============================================================*/
create table MATERIALES
(
   ID_MATERIAL          int not null,
   ID_STOCK             int not null,
   NOMBRE_MATERIAL      varchar(50),
   ESTADO_MATERIAL      int,
   UNIDADMEDIDA_MATERIAL varchar(50),
   primary key (ID_MATERIAL)
);

/*==============================================================*/
/* Table: OBRAS                                                 */
/*==============================================================*/
create table OBRAS
(
   ID_OBRA              int not null auto_increment,
   NOMBRE_OBRA          varchar(50) not null,
   ENCARGADO_OBRA       varchar(50) not null,
   ESTADO_OBRA          int,
   primary key (ID_OBRA)
);

/*==============================================================*/
/* Table: ORDENCOMPRA                                           */
/*==============================================================*/
create table ORDENCOMPRA
(
   NUMERO_OC            char(20) not null,
   ID_UNIDAD            int not null,
   FECHA_OC             date,
   FECHATOPE_OC         date,
   FECHAINGRESO_OC      datetime,
   SOLICITANTE_OC       char(50),
   OBSERVACION_OC       text,
   ESTADO_OC            varchar(50),
   NETO_OC              int,
   TOTAL_OC             int,
   primary key (NUMERO_OC)
);

/*==============================================================*/
/* Table: PROVEEDORES                                           */
/*==============================================================*/
create table PROVEEDORES
(
   RUT_PROVEEDOR        char(12) not null,
   ID_CIUDAD            int not null,
   NOMBRE_PROVEEDOR     varchar(50),
   DIRECCION_PROVEEDOR  varchar(50),
   CONTACTO_PROVEEDOR   varchar(50),
   FONO_PROVEEDOR       varchar(50),
   primary key (RUT_PROVEEDOR)
);

/*==============================================================*/
/* Table: RETIROS                                               */
/*==============================================================*/
create table RETIROS
(
   ID_RETIRO            int not null auto_increment,
   PERSONA_RETIRO       varchar(50),
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
   NOMBRE_RETIRO_CUSTODIA varchar(50),
   OBSERVACION_RETIRO_CUSTODIA text,
   FECHA_RETIRO_CUSTODIA datetime,
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
/* Table: SE_EJECUTA                                            */
/*==============================================================*/
create table SE_EJECUTA
(
   ID_TIPO_OBRA         int not null,
   ID_OBRA              int not null,
   ID_DEPARTAMENTO      int not null,
   FECHA_SE_EJECUTA     datetime not null,
   primary key (ID_TIPO_OBRA, ID_OBRA, ID_DEPARTAMENTO, FECHA_SE_EJECUTA)
);

/*==============================================================*/
/* Table: SE_GUARDAN                                            */
/*==============================================================*/
create table SE_GUARDAN
(
   ID_AREA              int not null,
   ID_SALDO             int not null,
   ID_MATERIAL          int not null,
   FECHA_SEGUARDAN      date not null,
   CANTIDAD_SEGUARDAN   int not null,
   primary key (ID_AREA, ID_SALDO, ID_MATERIAL, FECHA_SEGUARDAN)
);

/*==============================================================*/
/* Table: STOCK                                                 */
/*==============================================================*/
create table STOCK
(
   ID_STOCK             int not null auto_increment,
   PRECIO_STOCK         int,
   CANTIDAD_STOCK       int,
   MINIMO_STOCK         int,
   primary key (ID_STOCK)
);

/*==============================================================*/
/* Table: TIPOS_OBRAS                                           */
/*==============================================================*/
create table TIPOS_OBRAS
(
   ID_TIPO_OBRA         int not null,
   NOMBRE_TIPO_OBRA     varchar(50),
   primary key (ID_TIPO_OBRA)
);

/*==============================================================*/
/* Table: UNIDADES                                              */
/*==============================================================*/
create table UNIDADES
(
   ID_UNIDAD            int not null auto_increment,
   ID_DEPARTAMENTO      int not null,
   NOMBRE_UNIDAD        varchar(50),
   primary key (ID_UNIDAD)
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS
(
   ID_USUARIO           int not null auto_increment,
   ID_DEPARTAMENTO      int not null,
   RUT_USUARIO          int,
   NOMBRE_USUARIO       char(50),
   APELLIDOS_USUARIO    varchar(50),
   PASSWORD_USUARIO     char(10),
   primary key (ID_USUARIO)
);

alter table AREAS add constraint FK_EXISTEN foreign key (ID_BODEGA)
      references BODEGAS (ID_BODEGA) on delete restrict on update restrict;

alter table ASIGNA add constraint FK_ASIGNA foreign key (ID_OBRA)
      references OBRAS (ID_OBRA) on delete restrict on update restrict;

alter table ASIGNA add constraint FK_ASIGNA2 foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table ASIGNA add constraint FK_ASIGNA3 foreign key (ID_AREA)
      references AREAS (ID_AREA) on delete restrict on update restrict;

alter table ASOCIADO add constraint FK_ASOCIADO foreign key (ID_CUSTODIA)
      references CUSTODIAS (ID_CUSTODIA) on delete restrict on update restrict;

alter table ASOCIADO add constraint FK_ASOCIADO2 foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table ASOCIADO add constraint FK_ASOCIADO3 foreign key (ID_AREA)
      references AREAS (ID_AREA) on delete restrict on update restrict;

alter table ASOCIADO add constraint FK_ASOCIADO4 foreign key (ID_UNIDAD)
      references UNIDADES (ID_UNIDAD) on delete restrict on update restrict;

alter table CONTIENE add constraint FK_CONTIENE foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table CONTIENE add constraint FK_CONTIENE2 foreign key (NUMERO_OC)
      references ORDENCOMPRA (NUMERO_OC) on delete restrict on update restrict;

alter table CONTIENE add constraint FK_CONTIENE3 foreign key (ID_DOCUMENTO)
      references DOCUMENTOS (ID_DOCUMENTO) on delete restrict on update restrict;

alter table CONTIENE add constraint FK_CONTIENE4 foreign key (RUT_PROVEEDOR)
      references PROVEEDORES (RUT_PROVEEDOR) on delete restrict on update restrict;

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

alter table MATERIALES add constraint FK_SE_ALMACENA foreign key (ID_STOCK)
      references STOCK (ID_STOCK) on delete restrict on update restrict;

alter table ORDENCOMPRA add constraint FK_SE_ASOCIAN foreign key (ID_UNIDAD)
      references UNIDADES (ID_UNIDAD) on delete restrict on update restrict;

alter table PROVEEDORES add constraint FK_RESIDE foreign key (ID_CIUDAD)
      references CIUDADES (ID_CIUDAD) on delete restrict on update restrict;

alter table SE_EJECUTA add constraint FK_SE_EJECUTA foreign key (ID_TIPO_OBRA)
      references TIPOS_OBRAS (ID_TIPO_OBRA) on delete restrict on update restrict;

alter table SE_EJECUTA add constraint FK_SE_EJECUTA2 foreign key (ID_OBRA)
      references OBRAS (ID_OBRA) on delete restrict on update restrict;

alter table SE_EJECUTA add constraint FK_SE_EJECUTA3 foreign key (ID_DEPARTAMENTO)
      references DEPARTAMENTOS (ID_DEPARTAMENTO) on delete restrict on update restrict;

alter table SE_GUARDAN add constraint FK_SE_GUARDAN foreign key (ID_AREA)
      references AREAS (ID_AREA) on delete restrict on update restrict;

alter table SE_GUARDAN add constraint FK_SE_GUARDAN2 foreign key (ID_SALDO)
      references SALDOS (ID_SALDO) on delete restrict on update restrict;

alter table SE_GUARDAN add constraint FK_SE_GUARDAN3 foreign key (ID_MATERIAL)
      references MATERIALES (ID_MATERIAL) on delete restrict on update restrict;

alter table UNIDADES add constraint FK_SE_COMPONE foreign key (ID_DEPARTAMENTO)
      references DEPARTAMENTOS (ID_DEPARTAMENTO) on delete restrict on update restrict;

alter table USUARIOS add constraint FK_TRABAJA foreign key (ID_DEPARTAMENTO)
      references DEPARTAMENTOS (ID_DEPARTAMENTO) on delete restrict on update restrict;

