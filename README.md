# School Management system

#### It is developed using Laravel 11, javascript, Html and Css for style part

1. If you have installed Xampp, navigate to `xampp/php/php.ini` and edit the file to remove comment for `extension=zip` to avoid an error when running composer install.

1. clone or fork the repository

    ``` bash
    git@github.com:lawrencemwangi/school-management-system.git

    ```
1. Change the path of the project to the directory with the project and run the following commands

    ```bash
    npm install

    ```

1. copy the `.evn.example` into a file named  `.evn`

1. Generate the application key:
    ```bash
    php artisan key:generate
    ```
1. Create your database and run the migrations together with the seeder
    ```bash
    php artisan migrate --seed
    ```
1. Create a symbolic link for the uploaded images to work
    ```bash
    php artisan storage:link
