CREATE DATABASE IF NOT EXISTS proj_peliculas;
USE proj_peliculas;

CREATE TABLE IF NOT EXISTS users(
    id                  int(255) auto_increment not null,
    role                varchar(20),
    name                varchar(100),
    surname             varchar(200),
    email               varchar(200),
    password            varchar(200),
    created_at          datetime,    
    updated_at          datetime,
    remember_token      varchar(200),
    CONSTRAINT pk_usuarios PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS categorias(
    id              int(255) auto_increment not null,
    nombre          varchar(100),
    created_at      datetime,
    updated_at      datetime,
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS peliculas(
    id              int(255) auto_increment not null,
    id_user         int(255),
    id_categoria    int(255),
    imagen_path     varchar(200),
    titulo          varchar(100),
    descripcion     text,
    duracion        int(255),
    trailer         varchar(200),
    fecha_estreno   date,
    created_at      datetime,
    update_at       datetime,
    CONSTRAINT pk_peliculas PRIMARY KEY(id),
    CONSTRAINT fk_peliculas_users FOREIGN KEY(id_user) REFERENCES usuarios(id), 
    CONSTRAINT fk_peliculas_categorias FOREIGN KEY(id_categoria) REFERENCES categorias(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS novedades(
    id              int(255) auto_increment not null,
    id_pelicula     int(255),
    id_user         int(255),
    contenido       text,
    calificacion    int(10),
    created_at      datetime,
    updated_at      datetime,
    CONSTRAINT pk_novedades PRIMARY KEY(id),
    CONSTRAINT fk_novedades_peliculas FOREIGN KEY(id_pelicula) REFERENCES peliculas(id), 
    CONSTRAINT fk_novedades_users FOREIGN KEY(id_user) REFERENCES usuarios(id) 
)ENGINE=InnoDb;
