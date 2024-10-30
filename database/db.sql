CREATE TABLE usuarios (
    idUsuario   INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre     VARCHAR(255) NOT NULL,
    cargo       VARCHAR(255) NOT NULL,
    email       VARCHAR(255) NOT NULL UNIQUE KEY,
    password    TEXT NOT NULL,


    fyhCreacion DATETIME NULL,
    fyhActualizacion DATETIME NULL,
    estado VARCHAR(11)
)ENGINE=InnoDB;

INSERT INTO usuarios (nombre,cargo,email,password,fyhCreacion,estado) 
VALUES ('Bayron Adauri Ramos', 'Administrador','admin@gmail.com','admin123','2024-10-21 14:02:00','1');

    -- Creando la tabla ROLES --

CREATE TABLE roles (
    idRol  INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol     VARCHAR(255) NOT NULL UNIQUE KEY,
    fyhCreacion DATETIME NULL,
    fyhActualizacion DATETIME NULL,
    estado VARCHAR(11)
)ENGINE=InnoDB;

INSERT INTO roles (nombre_rol,fyhCreacion,estado) VALUES ('ADMINISTRADOR',NOW(),'1');
INSERT INTO roles (nombre_rol,fyhCreacion,estado) VALUES ('DIRECTOR',NOW(),'1');
INSERT INTO roles (nombre_rol,fyhCreacion,estado) VALUES ('DOCENTE',NOW(),'1');
INSERT INTO roles (nombre_rol,fyhCreacion,estado) VALUES ('SECRETARIA',NOW(),'1');
