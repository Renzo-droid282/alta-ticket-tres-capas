CREATE DATABASE IF NOT EXISTS tickets_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE tickets_db;

CREATE TABLE ticket (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    estado VARCHAR(30) NOT NULL DEFAULT 'pendiente'
);

INSERT INTO ticket (titulo, descripcion, estado)
VALUES
('Problema con la PC', 'La computadora del laboratorio no enciende.', 'pendiente'),
('Consulta de acceso', 'El usuario no puede ingresar al sistema.', 'pendiente');
