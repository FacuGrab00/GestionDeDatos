# DATOS PARA PROBAR EL FUNCIONAMIENTO DE LA CONSULTA (3)
SELECT DISTINCT i.codigo_inmueble
FROM inmuebles i,
     campos c,
     agencias a,
     agentes_comerciales ag;

# Obtener campos de villa
SELECT i.codigo_inmueble
FROM inmuebles i
         join campos c on c.codigo_inmueble = i.codigo_inmueble
WHERE i.id_ciudad = 49;

SELECT a.DNI
FROM agentes_comerciales a, trabajan t, inmuebles i
WHERE a.DNI = t.DNI && i.codigo_de_agencia = t.codigo_de_agencia && i.codigo_inmueble = 'B449';

INSERT INTO visitas(fecha, duracion, DNI_cliente, codigo_cliente, DNI_agente, codigo_inmueble, estado)
VALUES ('2023-01-02', '01:00:00', '00043430', 'A1969', '43415217', 'B440', 'REALIZADA'),
       ('2023-03-04', '01:00:00', '00043430', 'A1969', '43415217', 'B441', 'REALIZADA'),
       ('2023-04-17', '01:00:00', '00043430', 'A1969', '43415217', 'B449', 'REALIZADA'),
       ('2023-06-03', '01:00:00', '00043430', 'A1969', '43415217', 'B456', 'REALIZADA'),
       ('2023-08-02', '01:00:00', '00043430', 'A1969', '43415217', 'B460', 'REALIZADA'),
       ('2023-09-04', '01:00:00', '00043430', 'A1969', '43415217', 'B463', 'REALIZADA'),
       ('2023-10-02', '01:00:00', '00043430', 'A1969', '43415217', 'B450', 'REALIZADA'),
       ('2023-02-03', '01:00:00', '00043430', 'A1969', '43415217', 'B458', 'REALIZADA'),
       ('2023-03-06', '01:00:00', '00043430', 'A1969', '43415217', 'B442', 'REALIZADA'),
       ('2023-04-08', '01:00:00', '00043430', 'A1969', '43415217', 'B451', 'REALIZADA'),
       ('2023-04-09', '01:00:00', '00043430', 'A1969', '43415217', 'B452', 'REALIZADA'),
       ('2023-04-10', '01:00:00', '00043430', 'A1969', '43415217', 'B459', 'REALIZADA'),
       ('2023-04-10', '01:00:00', '00043430', 'A1969', '43415217', 'B464', 'REALIZADA'),
       ('2023-04-10', '01:00:00', '00043430', 'A1969', '43415217', 'B469', 'REALIZADA');
