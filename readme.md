# Datos de apoyo
- Octubre 20
    - ```php -S localhost:3200```
    - ```SET PASSWORD FOR 'frank'@'localhost' = PASSWORD('frank');```
    - ```CREATE DATABASE oct20;```
    - ```GRANT ALL PRIVILEGES ON oct20.* TO 'frank'@'localhost';```
    - ```FLUSH PRIVILEGES;```
    - ```CREATE TABLE users (id int(10) AUTO_INCREMENT PRIMARY KEY, name varchar(50), lastname varchar(50));```
    - ```INSERT INTO users (name, lastname) VALUES ('frank', 'leal');```
- Octubre 21
    - ```<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">```
    - ```ALTER TABLE users ADD COLUMN password varchar(20);```
    - ```ALTER TABLE users ADD COLUMN gender varchar(10)```

- Octubre 23
    - Ejercicios para explorar
        - Crear un buscador para la tabla
        - Implementar try-catch en todos los metodos
        - Implementar bindValue por variable a las consultas que lo permitan