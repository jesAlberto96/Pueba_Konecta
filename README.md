

## PRUEBA KONECTA

## TECNOLOGÍAS

- PHP
- Framework Laravel
- Mysql
- HTML
- CSS

## INSTALACIÓN DEL PROYECTO

1. Se debe instalar Composer.
2. Se debe tener instalado un aplicativo de apache en local, XAMPP o WAMPP, en mi caso utilice XAMPP
3. Git clone al repositorio, en mi caso dentro de la carpeta HTDOCS de XAMPP
    - git clone https://github.com/jesAlberto96/Pueba_Konecta.git
4. Ejecutar dentro del proyecto el comando:
    - composer install
5. Crear la base de datos con el nombre: prueba_konecta
6. Seguido ejecutar el comando:
    - php artisan migrate --seed o php artisan migrate:refresh --seed (Crea las tablas y las llena con datos de prueba)
7. Por ultimo ejecutar el comando:
    - php artisan serve

## CONSULTAS SQL
1. Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
    - SELECT * FROM `productos` WHERE stock = (select MAX(stock) from productos);

2. Realizar una consulta que permita conocer cuál es el producto más vendido.
    - SELECT DISTINCT v.producto_id, p.nombre, (select SUM(cantidad) from ventas where producto_id = v.producto_id) as cantidadVendida FROM  ventas v left join productos p on v.producto_id = p.id ORDER by cantidadVendida DESC LIMIT 1;
