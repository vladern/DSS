# DSS
Proyecto git para DSS

# Install
composert install

touch database/database.sqlite

./init.sh

# Comandos utiles

# --Migrations

php artisan make:migration add_categories_table --create=categories

//crear migración con codigo ya generado

php artisan migrate
//generas las tablas en la bd

sqlbrowser nombre.sqlite
//ver la base de datos

php artisan make:model Category
//crea un modelo

php artisan make:seeder NombreSeeder
//lanzar los seeds

php artisan db:seed
//restaurar seeds

php artisan migrate:refresh --seed

**sqlite**
//crea bd
touch database/database.sqlite

//crea las tablas en la bd
php artisan migrate:install

//se puede observar las tablas
sqlitebrowser database/database.sqlite


**Controladores**

php artisan make:controler NombreDelControlador

//crear un controlador

# Dependencias
https://github.com/cviebrock/eloquent-sluggable

https://laravelcollective.com/docs/5.3/bus
