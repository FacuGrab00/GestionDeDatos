CREATE TABLE personas
(
    DNI       VARCHAR(20) PRIMARY KEY,
    direccion VARCHAR(255) NOT NULL,
    nombre    VARCHAR(255) NOT NULL
);

CREATE TABLE clientes
(
    DNI            VARCHAR(20),
    codigo_cliente VARCHAR(20),
    fecha_registro DATE,
    PRIMARY KEY (DNI, codigo_cliente),
    FOREIGN KEY (DNI) REFERENCES personas (DNI)
);

CREATE TABLE agentes_comerciales
(
    DNI                      VARCHAR(20) PRIMARY KEY,
    fecha_contratacion       DATE        NOT NULL,
    antiguedad               VARCHAR(20) NOT NULL,
    cantidad_anual_facturada INT         NOT NULL DEFAULT 0,
    FOREIGN KEY (DNI) REFERENCES personas (DNI)
);

CREATE TABLE ciudades
(
    id_ciudad INT AUTO_INCREMENT PRIMARY KEY,
    nombre    VARCHAR(255) NOT NULL
);

CREATE TABLE agencias
(
    codigo_de_agencia VARCHAR(20) PRIMARY KEY,
    direccion         VARCHAR(255) NOT NULL,
    telefono          VARCHAR(20)  NOT NULL,
    director          VARCHAR(20),
    id_ciudad         INT,
    FOREIGN KEY (director) REFERENCES agentes_comerciales (DNI),
    FOREIGN KEY (id_ciudad) REFERENCES ciudades (id_ciudad)
);

CREATE TABLE registran
(
    codigo_de_agencia VARCHAR(20),
    DNI_cliente       VARCHAR(20),
    codigo_cliente    VARCHAR(20),
    DNI_agente        VARCHAR(20),
    fecha_registro    DATE NOT NULL,
    PRIMARY KEY (codigo_de_agencia, DNI_cliente, codigo_cliente, DNI_agente),
    FOREIGN KEY (codigo_de_agencia) REFERENCES agencias (codigo_de_agencia),
    FOREIGN KEY (DNI_cliente, codigo_cliente) REFERENCES clientes (DNI, codigo_cliente),
    FOREIGN KEY (DNI_agente) REFERENCES agentes_comerciales (DNI)
);

CREATE TABLE zonas
(
    id_ciudad         INT,
    nombre            VARCHAR(255),
    codigo_de_agencia VARCHAR(20),
    PRIMARY KEY (id_ciudad, nombre),
    FOREIGN KEY (id_ciudad) REFERENCES ciudades (id_ciudad) ON DELETE CASCADE,
    FOREIGN KEY (codigo_de_agencia) REFERENCES agencias (codigo_de_agencia)
);

CREATE TABLE inmuebles
(
    codigo_inmueble   VARCHAR(20) PRIMARY KEY,
    propietario       VARCHAR(20),
    direccion         VARCHAR(255),
    estado            VARCHAR(50),
    precio_venta      REAL,
    codigo_de_agencia VARCHAR(20),
    nombre_zona       VARCHAR(255),
    id_ciudad         INT,
    fecha_disponible  DATE,
    FOREIGN KEY (propietario) REFERENCES clientes (DNI),
    FOREIGN KEY (codigo_de_agencia) REFERENCES agencias (codigo_de_agencia),
    FOREIGN KEY (id_ciudad, nombre_zona) REFERENCES zonas (id_ciudad, nombre)
);

CREATE TABLE preferencias
(
    secuencia              INT         NOT NULL,
    DNI                    VARCHAR(20) NOT NULL,
    codigo_cliente         VARCHAR(20) NOT NULL,
    fecha                  DATE        NOT NULL,
    numero_de_habitaciones INT         NOT NULL,
    precio_maximo          REAL,
    precio_minimo          REAL        NOT NULL DEFAULT 0,
    tipo                   VARCHAR(50) NOT NULL,
    PRIMARY KEY (DNI, codigo_cliente, secuencia),
    FOREIGN KEY (DNI, codigo_cliente) REFERENCES clientes (DNI, codigo_cliente)
        ON DELETE CASCADE
);

CREATE TABLE tienen_4
(
    secuencia      INT,
    nombre_zona    VARCHAR(255),
    id_ciudad      INT,
    codigo_cliente VARCHAR(20),
    DNI_cliente    VARCHAR(20),
    PRIMARY KEY (secuencia, nombre_zona, id_ciudad, DNI_cliente, codigo_cliente),
    FOREIGN KEY (id_ciudad, nombre_zona) REFERENCES zonas (id_ciudad, nombre),
    FOREIGN KEY (DNI_cliente, codigo_cliente) REFERENCES clientes (DNI, codigo_cliente)
);

CREATE TABLE viviendas
(
    codigo_inmueble     VARCHAR(20) PRIMARY KEY,
    banios              INT     NOT NULL,
    numero_habitaciones INT     NOT NULL,
    descripcion         VARCHAR(255),
    superficie          REAL    NOT NULL,
    plaza_garaje        BOOLEAN NOT NULL,
    FOREIGN KEY (codigo_inmueble) REFERENCES inmuebles (codigo_inmueble)
);

CREATE TABLE locales_comerciales
(
    codigo_inmueble VARCHAR(20) PRIMARY KEY,
    area            REAL NOT NULL,
    uso             VARCHAR(255),
    FOREIGN KEY (codigo_inmueble) REFERENCES inmuebles (codigo_inmueble)
);

CREATE TABLE campos
(
    codigo_inmueble VARCHAR(20) PRIMARY KEY,
    superficie      REAL    NOT NULL,
    urbanizacion    BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (codigo_inmueble) REFERENCES inmuebles (codigo_inmueble)
);

CREATE TABLE trabajan
(
    DNI               VARCHAR(20),
    codigo_de_agencia VARCHAR(20),
    PRIMARY KEY (DNI, codigo_de_agencia),
    FOREIGN KEY (DNI) REFERENCES agentes_comerciales (DNI),
    FOREIGN KEY (codigo_de_agencia) REFERENCES agencias (codigo_de_agencia)
);

CREATE TABLE visitas
(
    id_visita       INT AUTO_INCREMENT PRIMARY KEY,
    senal           VARCHAR(255),
    fecha           DATE        NOT NULL,
    duracion        TIME        NOT NULL,
    DNI_cliente     VARCHAR(20) NOT NULL,
    codigo_cliente  VARCHAR(20) NOT NULL,
    DNI_agente      VARCHAR(20) NOT NULL,
    codigo_inmueble VARCHAR(20),
    estado          VARCHAR(20) NOT NULL DEFAULT 'PENDIENTE',
    FOREIGN KEY (DNI_cliente, codigo_cliente) REFERENCES clientes (DNI, codigo_cliente),
    FOREIGN KEY (DNI_agente) REFERENCES agentes_comerciales (DNI),
    FOREIGN KEY (codigo_inmueble) REFERENCES inmuebles (codigo_inmueble)
);

CREATE TABLE venden
(
    DNI_cliente     VARCHAR(20),
    codigo_cliente  VARCHAR(20),
    DNI_agente      VARCHAR(20),
    codigo_inmueble VARCHAR(20),
    fecha_venta     DATE,
    PRIMARY KEY (DNI_cliente, codigo_cliente, DNI_agente, codigo_inmueble),
    FOREIGN KEY (DNI_cliente, codigo_cliente) REFERENCES clientes (DNI, codigo_cliente),
    FOREIGN KEY (DNI_agente) REFERENCES agentes_comerciales (DNI),
    FOREIGN KEY (codigo_inmueble) REFERENCES inmuebles (codigo_inmueble)
);

CREATE TABLE compran
(
    DNI_cliente     VARCHAR(20),
    codigo_cliente  VARCHAR(20),
    DNI_agente      VARCHAR(20),
    codigo_inmueble VARCHAR(20),
    fecha_compra    DATE NOT NULL,
    PRIMARY KEY (DNI_cliente, codigo_cliente, DNI_agente, codigo_inmueble),
    FOREIGN KEY (DNI_cliente, codigo_cliente) REFERENCES clientes (DNI, codigo_cliente),
    FOREIGN KEY (DNI_agente) REFERENCES agentes_comerciales (DNI),
    FOREIGN KEY (codigo_inmueble) REFERENCES inmuebles (codigo_inmueble)
);

CREATE TABLE telefonos
(
    num_tel  VARCHAR(20) NOT NULL,
    DNI      VARCHAR(20),
    cod_area VARCHAR(20) NOT NULL DEFAULT 054,
    PRIMARY KEY (DNI, num_tel),
    FOREIGN KEY (DNI) REFERENCES personas (DNI)
);
