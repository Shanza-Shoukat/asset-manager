<!-- Asset Manager -->

This is a Laravel app for managing users and assets. An admin can add users and assets, then assign or unassign assets as needed...

 <!-- What the app can do -->

-Admin login and logout
-Add, view, edit, and delete users
-Add, view, edit, and delete assets
-Assign available assets to active users
-Unassign assets and keep their assignment records
-Show total, available, and assigned assets on the dashboard
-Paginate the users and assets lists

<!-- Built with -->

 Laravel 12
 PHP 8.2+
 MySQL
 Blade and Bootstrap

 <!-- Run the app locally -->

1- Clone the GitHub repository and open its folder:

   bash--
   git clone <GitHub repository URL>
   cd asset-manager
   

2- Install dependencies:

   bash--
   composer install
   

3- Copy /.env.example/ to .env:

   powershell---
   Copy-Item .env.example .env
   

4= create a MySQL database called /asset_manager/. Then check these database settings in /.env/ and update the username or password if yours are different:

   env--
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=asset_manager
   DB_USERNAME=root
   DB_PASSWORD=
   

5- Generate the application key and create the tables with sample data:

   bash--
   php artisan key:generate
   php artisan migrate --seed
   

6- start the app:

   bash--
   php artisan serve
   

   Open http://127.0.0.1:8000 in your browser

 <!-- test admin login -->

Use the test account created by AdminSeeder.php:

-- Email: admin@example.com
-- Password: 11221122

<!-- screenshots -->

add screenshots of the login dashboard
pages to the SS folder
