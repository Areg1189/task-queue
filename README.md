# TASK QUEU

## tasks description

We need to implement a custom queue management module in the Laravel framework.
No 3rd party libraries should be used.
For this we should have a Queue manager class that will provide a functional API for adding tasks to the queue. 
Tasks should be executed asynchronously. 
The System should allow implementing custom tasks as PHP classes. 
You could use Mysql as a database and Linux commands.
As an example please provide 2 controllers that are creating 2 different test tasks.
There should be another controller that is displaying a table with the tasks in the queue with the corresponding statuses.


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

### DB CONFIG
- DB_CONNECTION=mysql
- DB_HOST=mysql
- DB_PORT=3306
- DB_DATABASE=task_queue
- DB_USERNAME=task_queue
- DB_PASSWORD=task_queue


