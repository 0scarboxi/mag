#  Instalación de base de datos 

1. **Inicia Sesión en phpMyAdmin:**
    
    - Abre tu navegador y visita `http://localhost/phpmyadmin`.
    - Inicia sesión con tus credenciales.
2. **Crea una Base de Datos:**
    
    - En el panel de la izquierda, selecciona "Nueva".
    - Ingresa el nombre `cerveceria` y selecciona `utf8_general_ci` como el cotejamiento (collation).
    - Haz clic en "Crear".
3. **Selecciona la Base de Datos:**
    
    - En el panel de la izquierda, selecciona la base de datos `cerveceria`.
4. **Ejecuta las Consultas SQL:**
    
    - Dirígete a la pestaña "SQL" en la parte superior.
    - Copia y pega las consultas SQL proporcionadas.
5. **Ejecuta las Consultas SQL por Separado:**
    
    - Puedes copiar y pegar cada consulta SQL por separado y hacer clic en "Ir" para ejecutarlas.
6. **Verifica la Inserción de Datos:**
    
    - Selecciona la tabla `cervezas` en el panel izquierdo y verifica que los datos se hayan insertado correctamente.

#### consultas SQL:

```
CREATE DATABASE IF NOT EXISTS cerveceria;

USE cerveceria;

CREATE TABLE IF NOT EXISTS cervezas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    tipo VARCHAR(10) NOT NULL,
    graduacion_alcoholica INT NOT NULL CHECK(graduacion_alcoholica > 0),
    pais VARCHAR(60) NOT NULL,
    precio INT NOT NULL CHECK(precio > 0),
    ruta_imagen VARCHAR(100) NOT NULL
);


INSERT INTO cervezas (nombre, tipo, graduacion_alcoholica, pais, precio, ruta_imagen) 
VALUES 
('Magna 1', 'Tostada', 5, 'España', 3, 'images/1.png'),
('Magna 2', 'Rubia', 6, 'Alemania', 4, 'images/2.png'),
('Magna 3', 'De trigo', 4, 'Bélgica', 5, 'images/3.png'),
('Magna 4', 'Negra', 7, 'Estados Unidos', 6, 'images/4.png'),
('Magna 5', 'Rubia', 5, 'España', 3, 'images/5.png'),
('Magna 6', 'De trigo', 6, 'Alemania', 4, 'images/6.png'),
('Magna 7', 'Negra', 4, 'Bélgica', 5, 'images/7.png'),
('Magna 8', 'Tostada', 7, 'Estados Unidos', 6, 'images/8.png'),
('Magna 9', 'Rubia', 5, 'España', 3, 'images/9.png');

```
