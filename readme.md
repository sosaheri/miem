# Moratoria Impositiva Extraordinaria Municipal Año 2019/2020

Aplicación desarrollada con el framework Laravel 5.7 para la captura de deuda de impuesto y pago via electronica

### Prerequisitos

¿Que necesita tener instalado en su servidor?

```
PHP >= 7.2
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
Composer
Git
DomPDF
Access Token & API Key de Mercado Pago
```

### Instalación


Clone el repositorio: 
```
git clone git@github.com:sosaheri/miem.git
```

vaya al repositorio: 
```
cd miem
```

Instale dependencias

```
composer install
```

de permiso a carpeta storage

```
sudo chown -R www-data: storage
sudo chmod -R 755 storage
```

Apunte a la carpeta /public

```
nano /etc/apache2/sites-enabled/000-default.conf
```

reemplace

```
DocumentRoot /var/www/html

<Directory /var/www/html/>
```

con

```
DocumentRoot /var/www/gestion-incidencias/public

<Directory /var/www/gestion-incidencias/public/>
```

y agregue

```
RewriteEngine On
RewriteBase /var/www/gestion-incidencias/public
```

Guarde y reinicie su servidor

```
sudo service apache2 restart
```

Copiar .env.example a .env: 

```
cp .env.example .env
```

Crear key de aplicación: 

```
php artisan key:generate
```

```
Llenar datos de MDP en .env o esperar y llenarlos por medio de la interfaz gráfica
```


## Ejecute las migraciones

luego de haber creado su base de datos y colocados los datos en .env permita que laravel cree las tablas correspondientes y datos básicos

```
php artisan migrate
```

```
php artisan db:seed
```

