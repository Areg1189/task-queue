# TASK QUEU

## manual
`composer install`

`docker-compose up -d`

- Go inside the container and start migrations

`docker-compose exec php-fpm bash`
`php artisan migrate`


### The project is available at. - **http://localhost:23000/**

### Routes
- /example-task-1: Adds an ExampleTask1 to the queue.
- /example-task-2: Adds an ExampleTask2 to the queue.
- /queue: Displays a table with the tasks in the queue and their statuses.


To activate the scheduler, you need to configure a cron job to run the Laravel scheduler every minute. Open your server's cron configuration file (typically using the crontab -e command) and add the following line:

`* * * * * php /path-to-laravel-project/artisan schedule:run >> /dev/null 2>&1`

or you can run a command for one-time execution to check inside the container
`php artisan schedule:run`


