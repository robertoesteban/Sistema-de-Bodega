INSERT INTO `USUARIOS` (`ID_USUARIO`, `ID_DEPARTAMENTO`, `RUT_USUARIO`, `NOMBRE_USUARIO`, `APELLIDOS_USUARIO`, `PASSWORD_USUARIO`) VALUES
(1, 0, '12345678-5', 'Usuario', 'Prueba', '12345678');

INSERT INTO `DIRECCIONES` (`ID_DIRECCION`, `NOMBRE_DIRECCION`) VALUES
(1, 'Alcaldia'),
(2, 'Administracion Municipal'),
(3, 'Secretaria Municipal'),
(4, 'Secretaria de Planificacion'),
(5, 'Direccion de Administacion y Finanzas'),
(6, 'Direccion Juridica'),
(7, 'Direccion de Control'),
(8, 'Direccion de Obras'),
(9, 'DIreccion de Transito y Transporte Publico'),
(10, 'Direccion de Aseo y Ornato'),
(11, 'Direccion de Desarrollo Comunitario'),
(12, 'Direccion de Servicios Traspasados'),
(13, 'Direccion de Concesiones');


INSERT INTO `DEPARTAMENTOS` (`ID_DEPARTAMENTO`, `ID_DIRECCION`, `NOMBRE_DEPARTAMENTO`) VALUES
(1, 5, 'Bienes'),
(2, 1, 'Gabinete'),
(3, 1, 'Relaciones Publicas'),
(4, 2, 'Delegacion Municipal de Alerce'),
(5, 2, 'Depto Licitaciones y Gestion Abastecimiento'),
(6, 2, 'Prog. Red de Telecentros Comunitarios'),
(7, 1, 'Juzgado Policia Local'),
(8, 2, 'Administracion Edificio Consistorial II'),
(9, 2, 'Gimnasio Municipal Delegacion Alerce'),
(10, 2, 'Estado Municipal Delegacion Alerce'),
(11, 2, 'Prog. Quiero Mi Barrio'),
(12, 2, 'Depto Operativo Seguridad Cuidadana DOSEC'),
(13, 3, 'Oficina de Concejo y Concejales'),
(14, 5, 'Depto de Administracion de Bienes'),
(15, 5, 'Depto de Contabilidad y Presupuesto'),
(16, 4, 'Depto de Coordinacion'),
(17, 4, 'Depto de Proyectos'),
(18, 4, 'Depto de Estudios y Presupuesto'),
(19, 4, 'Depto de planificacion'),
(20, 4, 'Depto de Informatica'),
(21, 4, 'Depto de la Vivienda y Desarrollo Urbano'),
(22, 5, 'Depto de Tesoreria'),
(23, 5, 'Depto de Rentas y Patentes'),
(24, 5, 'Depto de Fiscalizacion y Cobranzas'),
(25, 5, 'Depto de Personal'),
(26, 5, 'Depto de Prevencion de Riesgos'),
(27, 5, 'Depto de Bienestar'),
(28, 6, 'Depto Judicial'),
(29, 6, 'Depto de Bienes'),
(30, 6, 'Depto Administrativo'),
(31, 7, 'Depto de Auditoria Operativa y Control de Gestion'),
(32, 7, 'Depto de Analisis y Revision'),
(33, 8, 'Depto de Urbanismo y Construccion'),
(34, 8, 'Depto de Permisos'),
(35, 8, 'Depto de Inspeccion Tecnica de Obras'),
(36, 8, 'Depto de Operaciones'),
(37, 8, 'Depto de Obras Menores'),
(38, 8, 'Depto de Mantenimiento'),
(39, 8, 'Depto Electrico'),
(40, 9, 'Depto de Permisos de Circulacion'),
(41, 9, 'Depto de Licencias de Conducir'),
(42, 9, 'Depto Administrativo'),
(43, 9, 'Depto de SeÃ±alizacion e Inspeccion'),
(44, 9, 'Depto de Ingenieria del Transito y Proyectos'),
(45, 10, 'Depto de Aseo'),
(46, 10, 'Depto de Ornato'),
(47, 10, 'Depto de Estudios');


INSERT INTO `UNIDADES` (`ID_UNIDAD`, `ID_DEPARTAMENTO`, `NOMBRE_UNIDAD`) VALUES
(1, 1, 'Bodega'),
(2, 7, '1er Juzgado de Policia Local'),
(3, 7, '2do Juzgado de Policia Local'),
(4, 13, 'Concejal Luis Andrade'),
(5, 13, 'Concejal Claudia Reyes'),
(6, 13, 'Concejal Patricia Espinoza'),
(7, 13, 'Concejal Gervoy Paredes'),
(8, 13, 'Concejal Leopoldo Pineda'),
(9, 13, 'Concejal Pedro Sandoval'),
(10, 13, 'Concejal Marco Velasquez'),
(11, 13, 'Concejal Jose Aburto');




INSERT INTO `CIUDADES` VALUES
('Arica'),
('Iquique'),
('Pozo Almonte'),
('Alto Hospicio'),
('Antofagasta'),
('Mejillones'),
('Taltal'),
('Calama');
('Tocopilla');
('Copiapo');
('El Salvador');
('Vallenar');
('La Serena');
('Coquimbo');
('Ovalle');
('Valparaiso');
('Quinteros');
('Quilpue');
('Quillota');
('San Antonio');
('Santiago');
('Rancagua');
('Talca');
('Concepcion');
('Talcahuano');
('Chillan');
('Temuco');
('Valdivia');
('Osorno');
('Puerto Montt');
('Ancud');
('Castro');
('Quellon');
('Cohyaique');
('Punta Arenas');


INSERT INTO `BODEGAS` (`ID_BODEGA`, `NOMBRE_BODEGA`) VALUES
(1, 'Bodega de Abastecimiento Materiales de Oficina y C'),
(2, 'Bodega Balmaceda'),
(3, 'Bodega Parque Industrial');


INSERT INTO `TIPOS_OBRAS` (`ID_TIPO_OBRA`, `CODIGO_TIPO_OBRA`, `NOMBRE_TIPO_OBRA`) VALUES
(1, 'CT', 'Construccion'),
(2, 'MT', 'Mantenimiento'),
(3, 'RS', 'Reposicion'),
(4, 'RC', 'Reparacion'),
(5, 'DD', 'Dideco');


