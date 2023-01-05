**git clone le projet**

aller dans le dossier du projet 

faire : 

  **composer update**

ensuite créer un fichier .env dans lequel on copie colle tout le .env.example

creer une base de données laravel213 (par exemple) dans mysql

  **CREATE DATABASE laravel213;**

modifier les infos de la base de données dans le .env ; 

  DB_DATABASE=**laravel213**
  DB_USERNAME=**root**
  DB_PASSWORD=**motdepasse**

mettre a jour la base de données et les tables 
  
  **php artisan migrate:fresh**
  
donner une clé pour le site laravel 

  **php artisan key:generate**
  
enfin : 

  **php artisan serve**
  
  puis http://127.0.0.1:8000/api/... sur postman ou navigateur
