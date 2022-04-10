# GYM-Management

to run this project please do the following
1. Clone the project
2. copy .env.example to .env
3. update .env configs to point to your database and smtp details
4. issue composer install command on terminal
5. issue npm run dev command on terminal
6. run php artisan optimize
7. run php artisan migrate
8. run php artisan db:seed --class=CreateUsersSeeder
9. run php artisan serve
