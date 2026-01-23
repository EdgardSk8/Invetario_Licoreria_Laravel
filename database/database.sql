-- --------------------------------------------------------
-- Base de datos
-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS inventario_licoreria;
USE inventario_licoreria;

-- --------------------------------------------------------
-- Tabla: categorias
-- --------------------------------------------------------
CREATE TABLE categorias (
    id_categoria BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_categoria VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_categoria)
) ENGINE=InnoDB;

-- --------------------------------------------------------
-- Tabla: proveedores
-- --------------------------------------------------------
CREATE TABLE proveedores (
    id_proveedor BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_proveedor VARCHAR(100) NOT NULL,
    telefono_proveedor VARCHAR(20),
    direccion_proveedor VARCHAR(150),
    PRIMARY KEY (id_proveedor)
) ENGINE=InnoDB;

-- --------------------------------------------------------
-- Tabla: productos
-- --------------------------------------------------------
CREATE TABLE productos (
    id_producto BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_producto VARCHAR(100) NOT NULL,
    marca_producto VARCHAR(50),
    precio_compra DECIMAL(10,2) NOT NULL,
    precio_venta DECIMAL(10,2) NOT NULL,
    stock_producto INT NOT NULL,
    id_categoria BIGINT UNSIGNED NOT NULL,
    id_proveedor BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (id_producto),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria),
    FOREIGN KEY (id_proveedor) REFERENCES proveedores(id_proveedor)
) ENGINE=InnoDB;

-- --------------------------------------------------------
-- Tabla: roles
-- --------------------------------------------------------
CREATE TABLE roles (
    id_rol BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_rol VARCHAR(50) NOT NULL,
    descripcion_rol VARCHAR(100),
    PRIMARY KEY (id_rol)
) ENGINE=InnoDB;

-- --------------------------------------------------------
-- Tabla: usuarios
-- --------------------------------------------------------
CREATE TABLE usuarios (
    id_usuario BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_usuario VARCHAR(100) NOT NULL,
    usuario_login VARCHAR(50) NOT NULL UNIQUE,
    contrasenia VARCHAR(255) NOT NULL,
    id_rol BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
) ENGINE=InnoDB;

-- --------------------------------------------------------
-- Tabla: ventas
-- --------------------------------------------------------
CREATE TABLE ventas (
    id_venta BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    fecha_venta TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    total_venta DECIMAL(10,2) NOT NULL,
    id_usuario BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (id_venta),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
) ENGINE=InnoDB;

-- --------------------------------------------------------
-- Tabla: detalle_venta
-- --------------------------------------------------------
CREATE TABLE detalle_venta (
    id_detalle_venta BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_venta BIGINT UNSIGNED NOT NULL,
    id_producto BIGINT UNSIGNED NOT NULL,
    cantidad_vendida INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_detalle_venta),
    FOREIGN KEY (id_venta) REFERENCES ventas(id_venta),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
) ENGINE=InnoDB;

-- --------------------------------------------------------
-- Tabla: movimientos_inventario
-- --------------------------------------------------------
CREATE TABLE movimientos_inventario (
    id_movimiento BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_producto BIGINT UNSIGNED NOT NULL,
    tipo_movimiento ENUM('ENTRADA','SALIDA') NOT NULL,
    cantidad_movimiento INT NOT NULL,
    fecha_movimiento TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    descripcion_movimiento VARCHAR(150),
    PRIMARY KEY (id_movimiento),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
) ENGINE=InnoDB;
