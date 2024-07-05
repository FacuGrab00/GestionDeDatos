CREATE TABLE visitas_importantes
(
    id_visita       INT AUTO_INCREMENT PRIMARY KEY,
    codigo_inmueble VARCHAR(20),
    propietario     VARCHAR(20),
    direccion       VARCHAR(255),
    precio_venta    REAL,
    DNI_cliente     VARCHAR(20),
    nombre_cliente  VARCHAR(255),
    DNI_agente      VARCHAR(20),
    nombre_agente   VARCHAR(255),
    fecha_visita    DATE,
    FOREIGN KEY (codigo_inmueble) REFERENCES inmuebles (codigo_inmueble),
    FOREIGN KEY (propietario) REFERENCES clientes (DNI),
    FOREIGN KEY (DNI_cliente) REFERENCES clientes (DNI),
    FOREIGN KEY (DNI_agente) REFERENCES agentes_comerciales (DNI)
);

DELIMITER //

CREATE TRIGGER trg_visitas_importantes_insert
    AFTER INSERT
    ON visitas
    FOR EACH ROW
BEGIN
    IF TIME_TO_SEC(NEW.duracion) > 3600 THEN
        INSERT INTO visitas_importantes (codigo_inmueble, propietario, direccion, precio_venta, DNI_cliente,
                                         nombre_cliente, DNI_agente, nombre_agente, fecha_visita)
        SELECT NEW.codigo_inmueble,
               inmuebles.propietario,
               inmuebles.direccion,
               inmuebles.precio_venta,
               NEW.DNI_cliente,
               (SELECT nombre FROM personas WHERE DNI = NEW.DNI_cliente),
               NEW.DNI_agente,
               (SELECT nombre FROM personas WHERE DNI = NEW.DNI_agente),
               NEW.fecha
        FROM inmuebles
        WHERE inmuebles.codigo_inmueble = NEW.codigo_inmueble;
    END IF;
END//

CREATE TRIGGER trg_visitas_importantes_update
    AFTER UPDATE
    ON visitas
    FOR EACH ROW
BEGIN
    IF TIME_TO_SEC(NEW.duracion) > 3600 THEN
        INSERT INTO visitas_importantes (codigo_inmueble, propietario, direccion, precio_venta, DNI_cliente,
                                         nombre_cliente, DNI_agente, nombre_agente, fecha_visita)
        SELECT NEW.codigo_inmueble,
               inmuebles.propietario,
               inmuebles.direccion,
               inmuebles.precio_venta,
               NEW.DNI_cliente,
               (SELECT nombre FROM personas WHERE DNI = NEW.DNI_cliente),
               NEW.DNI_agente,
               (SELECT nombre FROM personas WHERE DNI = NEW.DNI_agente),
               NEW.fecha
        FROM inmuebles
        WHERE inmuebles.codigo_inmueble = NEW.codigo_inmueble;
    END IF;
END//

DELIMITER ;

DELIMITER //

CREATE TRIGGER before_preferencia_insert
    BEFORE INSERT
    ON preferencias
    FOR EACH ROW
BEGIN
    IF NEW.fecha < CURDATE() THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'No se puede establecer una fecha de preferencia anterior a la fecha actual.';
    END IF;
END//

DELIMITER ;
