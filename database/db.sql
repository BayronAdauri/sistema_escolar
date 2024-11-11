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

-- Creando la tabla USUARIOS --

CREATE TABLE usuarios (
    id_usuario   INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre     VARCHAR(255) NOT NULL,
    id_rol       INT(11) NOT NULL,
    email       VARCHAR(255) NOT NULL UNIQUE KEY,
    password    TEXT NOT NULL,


    fyhCreacion DATETIME NULL,
    fyhActualizacion DATETIME NULL,
    estado VARCHAR(11),

    FOREIGN KEY (id_rol) REFERENCES roles (idRol) on delete no action on update cascade 
)ENGINE=InnoDB;

INSERT INTO usuarios (nombre,id_rol,email,password,fyhCreacion,estado) 
VALUES ('Bayron Adauri Ramos', '1','admin@gmail.com','$2y$10$zpRxJwmlvxDmwj.4CHjZROKqJAXjCukOfyX3AnF/Em7Sfd7k5gaHq','2024-10-21 14:02:00','1');

 

