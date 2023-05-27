<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Clone the repo
<code>git clone git@github.com:coraline-it/projetPatisserie.git</code>

## Database
- <code>mysql -u root -p</code>
- <code>CREATE DATABASE 'your_database_name';</code>
- <code>exit;</code>


## Move in repo
<code>cd projetPattiserie</code>

## configure .env
- <code>cp .env.example .env</code>
- <code>vim .env</code>

Change this lines :

<pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_user_name_mysql
DB_PASSWORD=your_password
</pre>


## Make composer install
<code>composer install</code>

## Make npm install
<code>npm install</code>

## Make npm install
<code>npm install</code>

## Generate key
<code>php artisan key:generate</code>

## Link storage
<code>php artisan link:storage</code>

## Run migrations
<code>php artisan migrate</code>

## Run seeders
<code>php artisan db:seed</code>

## Run app
- <code>npm run build</code>
- <code>php artisan serve</code>
- <code>npm run dev</code>



## Informations : 
Connexions super admin : 
- email : superadmin@test.com
- passwd : password

Connexion admin :
- email : admin@test.com
- passwd : password

Connexion simple customer
- email : user@test.com
- passwd : password
