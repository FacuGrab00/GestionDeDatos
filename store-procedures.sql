# Escribir una función que, dado el DNI de un agente,
# devuelva verdadero o falso dependiendo si tiene visitas agendadas para la próxima semana.

DELIMITER //

CREATE FUNCTION tiene_visitas_proxima_semana(DNI_agente VARCHAR(20))
    RETURNS BOOLEAN
BEGIN
    DECLARE tiene_visitas BOOLEAN;

    SELECT COUNT(*) > 0
    INTO tiene_visitas
    FROM visitas
    WHERE DNI_agente = visitas.DNI_agente
      AND fecha BETWEEN CURDATE() AND CURDATE() + INTERVAL 7 DAY;

    RETURN tiene_visitas;
END//

DELIMITER ;

# Escribir un procedimiento que reciba el DNI de un cliente y devuelva el listado de visitas a inmuebles que realizó en el último año.

DELIMITER //

CREATE PROCEDURE obtener_visitas_cliente_ultimo_year(IN DNI_cliente VARCHAR(20))
BEGIN
    SELECT v.id_visita,
           v.senal,
           v.fecha,
           v.duracion,
           v.DNI_cliente,
           v.codigo_cliente,
           v.DNI_agente,
           v.codigo_inmueble,
           v.estado,
           i.direccion AS direccion_inmueble,
           i.precio_venta
    FROM visitas v
             JOIN
         inmuebles i ON v.codigo_inmueble = i.codigo_inmueble
    WHERE v.DNI_cliente = DNI_cliente
      AND v.fecha >= CURDATE() - INTERVAL 1 YEAR;
END//

DELIMITER ;
