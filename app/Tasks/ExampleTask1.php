<?php

namespace App\Tasks;

use App\Contracts\TaskInterface;

class ExampleTask1 implements TaskInterface
{
    public function handle(array $payload): void
    {
        // Example task logic for Task 1
        sleep(5); // Simulate a time-consuming task

        // You can implement your custom task logic here
        // using Linux commands or other PHP code
        // The $parameters array contains any parameters you passed when adding the task to the queue
    }
}
