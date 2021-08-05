## About API pergamo v2.0

Esta API es la nueva versión de Enseñame v2.0, con las siguientes caracteristicas:

-   Framework Laravel [versión 7](https://laravel.com/docs/7.x#server-requirements).
-   Motor de base de datos MySql.
-   **Redis** [Redis en ubuntu](https://www.digitalocean.com/community/tutorials/como-instalar-y-proteger-redis-en-ubuntu-18-04-es)
-   **Supervisor** [Worker ejecución de colas](https://laravel.com/docs/7.x/queues#supervisor-configuration)

## Pasos y Comandos Iniciales

-   Asegurarse contar con los módulos de php a continuación: php-imap php-gmp php-curl php-bz2
-   Crear archivo .env en base al .env.example, escribir datos de accesos BD, redis y servidor email.
-   composer install
-   php artisan key:generate
-   php artisan jwt:secret
-   php artisan make:seeder UserSeeder
-   npm install && npm run dev
-   php artisan migrate:fresh --seed
-   sudo chmod -R 777 storage/
-   php artisan storage:link
-   php artisan serve --host="**mi-ip**" (Solo si no se tiene ejecutando en un host virtual)
-   composer dump-autoload  (Para actualizar la información del cargador automatico de clases)
-   Configurar supervisor para la ejecución automática de [queue](https://laravel.com/docs/7.x/queues#supervisor-configuration), para configurar la queue para logs:
    -   Cola log: crear el archivo con sudo **/etc/supervisor/conf.d/ensename-v2-laravel-worker.conf**, y agregar:
    ```
        [program:ensename-v2-laravel-worker]
        process_name=%(program_name)s_%(process_num)02d
        command=php /var/www/html/api-ensename-v2/artisan queue:work redis
        autostart=true
        autorestart=true
        user=root
        numprocs=8
        redirect_stderr=true
        stdout_logfile=/var/www/html/api-ensename-v2/storage/logs/worker.log
        stopwaitsecs=3600
    ```
    -   sudo supervisorctl reread
    -   sudo supervisorctl update
    -   En la dirección desplegada, se puede visualizar los jobs cuando se crean y sus cambios de estados en: http://host/telescope/jobs
-   Para recibir la sincronización del conector, es **OBLIGATORIO** que las instituciones tengan asociadas las MAC de los SEO, en la tabla **institution_mac**.

## Otros comandos

-   Crear models a partir de la BD [(Reliese)](https://github.com/reliese/laravel)

    - php artisan code:models --schema=**name_db**

-   Documentación autenticación [JWT](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/#generate-secret-key)

-   Documentación comprimido [Madzipper](https://github.com/madnest/madzipper)

-   php artisan make:controller NoteController

-   php artisan config:clear

-   php artisan cache:clear

---

## License

Copyright Health and life ips 2021
