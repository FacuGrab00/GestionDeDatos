# Creación de usuarios
CREATE USER 'Administrador'@'localhost' IDENTIFIED BY 'contraseña';
CREATE USER 'Diseñador'@'localhost' IDENTIFIED BY 'contraseña';
CREATE USER 'Programador'@'localhost' IDENTIFIED BY 'contraseña';

GRANT ALL PRIVILEGES ON inmobiliaria.* TO 'Administrador'@'localhost' WITH GRANT OPTION;

GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.* TO 'Programador'@'localhost';

GRANT SELECT,SHOW VIEW ON inmobiliaria.* TO 'Diseñador'@'localhost';

# Respaldo
CREATE USER 'usuariobackup'@'localhost' IDENTIFIED BY 'contraseña';
GRANT SELECT, SHOW VIEW, LOCK TABLES, EVENT ON inmobiliaria.* TO 'usuariobackup'@'localhost';
