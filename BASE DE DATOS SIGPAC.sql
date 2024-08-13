CREATE TABLE catalogo_roles(
	id_rol 		INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	clave 		INTEGER NOT NULL,
	descripcion TEXT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE empleados(
	id_emp  		INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	identificador	VARCHAR(20) NOT NULL,
	cve_rol 		INTEGER NOT NULL,
	nom_emp 		VARCHAR(50) NOT NULL,
	pri_ape 		VARCHAR(50) NOT NULL,
	seg_ape 		VARCHAR(50),
	username 		VARCHAR(10),
	password 		VARCHAR(100),
	FOREIGN KEY (cve_rol) REFERENCES catalogo_roles(id_rol)
)ENGINE=InnoDB;

CREATE TABLE catalogo_estatus_solicitudes(
	id_est_sol 	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	clave  		INTEGER NOT NULL,
	descripcion TEXT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE catalogo_contadores(
	id_con 		INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	valor 		BIGINT NOT NULL,
	descripcion TEXT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE catalogo_modo_pago(
	id_mod_pag 	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	clave 		INTEGER NOT NULL,
	descripcion TEXT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE catalogo_niveles_academicos(
	id_niv_aca 	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	clave 		INTEGER NOT NULL,
	descripcion TEXT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE catalogo_oferta_educativa(
	id_ofe_edu 	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	clave 		VARCHAR(20) NOT NULL,
	nom_ofe_edu TEXT NOT NULL,
	cve_niv_aca INTEGER NOT NULL,
	FOREIGN KEY (cve_niv_aca) REFERENCES catalogo_niveles_academicos(id_niv_aca)
)ENGINE=InnoDB;

CREATE TABLE catalogo_estatus_alumnos(
	id_est_alu 	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	clave 		INTEGER NOT NULL,
	descripcion TEXT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE planteles(
	id_pla 		INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	clave 		INTEGER NOT NULL,
	nom_pla 	TEXT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE alumnos(
	id_alu 		BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	curp 		VARCHAR(18) NOT NULL,
	nom_alu  	VARCHAR(50) NOT NULL,
	pri_ape  	VARCHAR(50) NOT NULL,
	seg_ape   	VARCHAR(50),
	fec_nac 	DATE NOT NULL,
	edad 		INTEGER NOT NULL,
	domicilio 	TEXT,
	fotografia 	TEXT,
	username  	VARCHAR(10),
	password  	VARCHAR(100)
)ENGINE=InnoDB;

CREATE TABLE matricula(
	id_mat 		BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cve_alu 	BIGINT NOT NULL,
	cve_ctl 	VARCHAR(10) NOT NULL,
	cve_pla 	INTEGER NOT NULL,
	cve_ofe_edu INTEGER NOT NULL,
	cve_est_alu INTEGER NOT NULL,
	cve_niv_aca INTEGER NOT NULL,
	FOREIGN KEY (cve_alu) REFERENCES alumnos(id_alu),
	FOREIGN KEY (cve_pla) REFERENCES planteles(id_pla),
	FOREIGN KEY (cve_ofe_edu) REFERENCES catalogo_oferta_educativa(id_ofe_edu),
	FOREIGN KEY (cve_est_alu) REFERENCES catalogo_estatus_alumnos(id_est_alu),
	FOREIGN KEY (cve_niv_aca) REFERENCES catalogo_niveles_academicos(id_niv_aca)
)ENGINE=InnoDB;

CREATE TABLE pagos(
	id_pago 	BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cve_mat  	BIGINT NOT NULL,
	periodo   	INTEGER NOT NULL,
	fecha 		DATE NOT NULL,
	mes  		VARCHAR(15) NOT NULL,
	monto 		DECIMAL(10,2) NOT NULL,
	recargos 	DECIMAL(10,2) NOT NULL,
	total 		DECIMAL(10,2) NOT NULL,
	FOREIGN KEY (cve_mat) REFERENCES matricula(id_mat)
)ENGINE=InnoDB;

CREATE TABLE solicitud_pagos(
	id_sol_pag 	BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	folio       VARCHAR(20) NOT NULL,
	cve_alu  	BIGINT NOT NULL,
	cve_pag 	BIGINT NOT NULL,
	rut_com 	TEXT NOT NULL,
	cve_est_sol INTEGER NOT NULL,
	cve_emp 	INTEGER NOT NULL,
	fec_sol 	DATE NOT NULL,
	fec_apr 	DATE NULL,
	FOREIGN KEY (cve_alu) REFERENCES alumnos(id_alu),
	FOREIGN KEY (cve_pag) REFERENCES pagos(id_pago),
	FOREIGN KEY (cve_est_sol) REFERENCES catalogo_estatus_solicitudes(id_est_sol),
	FOREIGN KEY (cve_emp) REFERENCES empleados(id_emp)
)ENGINE=InnoDB;

CREATE TABLE ingresos(
	id_ing 		BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cve_pag     BIGINT NOT NULL,
	monto   	DECIMAL(10,2) NOT NULL,
	recargos  	DECIMAL(10,2) NOT NULL,
	total   	DECIMAL(10,2) NOT NULL,
	recibo  	VARCHAR(15) NOT NULL,
	cve_mod_pag INTEGER NOT NULL,
	FOREIGN KEY (cve_pag) REFERENCES pagos(id_pago),
	FOREIGN KEY (cve_mod_pag) REFERENCES catalogo_modo_pago(id_mod_pag)
)ENGINE=InnoDB;


INSERT INTO `alumnos`(`curp`, `nom_alu`, `pri_ape`, `seg_ape`, `fec_nac`, `edad`, `domicilio`, `fotografia`,`username`,`password`) 
VALUES 
('CUFO920927HMCRLM06','OMAR','CRUZ','FLORES','1992-09-27',31,'IXTLAHAUCA, EDO DE MÉXICO',NULL,'CUFO920927','Acceso.A#1'),
('AAMJ780729HMCLNN05','JUAN CARLOS','ALVAREZ','MONTES DE OCA','1978-07-29',46,'TOLUCA, EDO DE MÉXICO',NULL,'AAMJ780729','Acceso.A#2'),
('COVC030610HMCLLSA4','CESAR','COLIN','VALLEJO','1992-09-27',31,'IXTLAHAUCA, EDO DE MÉXICO',NULL,'COVC030610','Acceso.A#3');

INSERT INTO `planteles`(`clave`, `nom_pla`) 
VALUES 
(1,'TOLUCA');

INSERT INTO `catalogo_niveles_academicos`(`clave`, `descripcion`) 
VALUES 
(1,'LICENCIATURA'),
(2,'MAESTRÍA'),
(3,'DOCTORADO');

INSERT INTO `catalogo_contadores`(`valor`, `descripcion`) 
VALUES
(1,'C-ALUMNOS'),
(1,'C-INGRESOS'),
(1,'C-FOLIOS');

INSERT INTO `catalogo_estatus_alumnos`(`clave`, `descripcion`) 
VALUES 
(1,'PREINSCRITO'),
(2,'INSCRITO'),
(3,'REINSCRITO'),
(4,'EGRESADO'),
(5,'BAJA DEFINITIVA'),
(6,'BAJA TEMPORAL');

INSERT INTO `catalogo_estatus_solicitudes`(`clave`, `descripcion`) 
VALUES 
(1,'Procesando'),
(2,'Procesado'),
(3,'Aprobado'),
(4,'Rechazado');

INSERT INTO `catalogo_modo_pago`(`clave`, `descripcion`) 
VALUES 
(1,'TRANSFERENCIA'),
(2,'TERMINAL'),
(3,'EFECTIVO');

INSERT INTO `catalogo_oferta_educativa`(`clave`, `nom_ofe_edu`, `cve_niv_aca`) 
VALUES 
('LD','DERECHO',1),
('LA','ADMINISTRACIÓN',1),
('LP','PEDAGOGÍA',1),
('LPSIC','PSICOPEDAGOGÍA',1),
('ME','EDUCACIÓN',2),
('MJO','JUICIOS ORALES',2),
('DE','EDUCACIÓN',3);

INSERT INTO `catalogo_roles`(`clave`, `descripcion`)
VALUES 
(1,'SISTEMAS'),
(2,'CONTROL ESCOLAR'),
(3,'COORDIANCIÓN ADMINISTRATIVA'),
(4,'DIRECCIÓN DE SERVICIOS ESCOLARES'),
(5,'DIRECCIÓN ADMINISTRATIVA');

INSERT INTO `empleados`(`identificador`, `cve_rol`, `nom_emp`, `pri_ape`, `seg_ape`,`username`,`password`) 
VALUES 
('SIS.#1',1,'OMAR','CRUZ','FLORES','SIGPAC.SIS','Acceso.Sis#1'),
('AD.T#1',3,'EFRAÍN','ARIS','JIMENEZ','SIGPAC.ADE','Acceso.AD#1'),
('AD.T#2',3,'ALDO','CONRADO','RAFAEL','SIGPAC.ADA','Acceso.AD#2');


####   OMITIR LAS SIGUIENTES LÍNEAS    #####

INSERT INTO `matricula`(`cve_alu`, `cve_ctl`, `cve_pla`, `cve_ofe_edu`, `cve_est_alu`, `cve_niv_aca`) 
VALUES 
(1,'24010001',1,1,2,1),
(2,'24010002',1,1,2,1),
(3,'24010003',1,1,2,1);

INSERT INTO `pagos`(`cve_mat`,`periodo`, `fecha`, `mes`, `monto`, `recargos`, `total`) 
VALUES 
(1,1,'2024-09-01','SEPTIEMBRE',1500.00,00.00,1500.00),
(1,1,'2024-10-01','OCTUBRE',1500.00,00.00,1500.00),
(1,1,'2024-11-01','NOVIEMBRE',1500.00,00.00,1500.00),
(1,1,'2024-12-01','DICIEMBRE',1500.00,00.00,1500.00),
(2,1,'2024-09-01','SEPTIEMBRE',1500.00,00.00,1500.00),
(2,1,'2024-10-01','OCTUBRE',1500.00,00.00,1500.00),
(2,1,'2024-11-01','NOVIEMBRE',1500.00,00.00,1500.00),
(2,1,'2024-12-01','DICIEMBRE',1500.00,00.00,1500.00),
(3,1,'2024-09-01','SEPTIEMBRE',1500.00,00.00,1500.00),
(3,1,'2024-10-01','OCTUBRE',1500.00,00.00,1500.00),
(3,1,'2024-11-01','NOVIEMBRE',1500.00,00.00,1500.00),
(3,1,'2024-12-01','DICIEMBRE',1500.00,00.00,1500.00);


INSERT INTO `solicitud_pagos`(`folio`, `cve_alu`, `cve_pag`, `rut_com`, `cve_est_sol`, `cve_emp`, `fec_sol`, `fec_apr`) 
VALUES 
('2407050001',1,1,'comprobantes/spei_01_07_2024.pdf',3,3,'2024-07-05','2024-07-08'),
('2407150002',1,2,'comprobantes/spei_01_08_2024.pdf',3,2,'2024-07-15','2024-07-18'),
('2407200003',1,3,'comprobantes/spei_01_09_2024.pdf',1,2,'2024-07-20',NULL),
('2407250004',1,4,'comprobantes/spei_01_10_2024.pdf',1,3,'2024-07-25',NULL);


INSERT INTO `solicitud_pagos`(`folio`, `cve_alu`, `cve_pag`, `rut_com`, `cve_est_sol`, `cve_emp`, `fec_sol`, `fec_apr`) 
VALUES 
('2407050005',2,5,'comprobantes/spei_01_07_2024.pdf',3,3,'2024-07-03','2024-07-10'),
('2407150006',2,6,'comprobantes/spei_01_08_2024.pdf',3,2,'2024-07-08','2024-07-15'),
('2407200007',2,7,'comprobantes/spei_01_09_2024.pdf',1,2,'2024-07-14',NULL),
('2407250008',2,8,'comprobantes/spei_01_10_2024.pdf',1,3,'2024-07-19',NULL);