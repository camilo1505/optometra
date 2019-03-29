CREATE TABLE usuario (
    id_usuario serial PRIMARY KEY,
    cedula varchar(15) NOT NULL,
    nombres varchar(60) NOT NULL,
    apellidos varchar(60) NOT NULL,
    usuario_password varchar(300) NOT NULL
);

CREATE TABLE rol (
    id_rol serial PRIMARY KEY,
    rol varchar(50) NOT NULL
);

CREATE TABLE roles (
    id_roles serial PRIMARY KEY,
    fk_usuario bigint,
    fk_rol bigint
);

CREATE TABLE producto (
    id_producto serial PRIMARY KEY,
    nombre_producto varchar(100) NOT NULL
);

CREATE TABLE catalogo (
    id_catalogo serial PRIMARY KEY,
    fk_producto bigint,
    fk_usuario bigint,
    referencia varchar(16) NOT NULL,
    marca varchar(16) NOT NULL,
    tipo VARCHAR(16) NOT NULL,
    imagen VARCHAR(100) NOT NULL,
    costo bigint NOT NULL,
    descripcion VARCHAR(100) NULL
);