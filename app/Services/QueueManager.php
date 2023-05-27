<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Artisan;

class QueueManager
{
    /**
     * Add a new task to the queue.
     *
     * @param string $className
     * @param array $payload
     * @return \App\Models\Task
     */
    public function addTask(string $className, array $payload): Task
    {
        return Task::create([
            'class_name' => $className,
            'payload' => json_encode($payload),
        ]);
    }


    /**
     * execute a task from the queue.
     *
     * @return void
     */
    public function executeTasks(): void
    {
        $tasks = Task::where('status', 'pending')->get();

        foreach ($tasks as $task) {
            $this->executeTask($task);
        }
    }

    private function executeTask(Task $task): void
    {
        $taskId = $task->id;
        $task->status = 'processing';
        $task->save();

        // Execute the task asynchronously
        exec("php artisan task:execute $taskId > /dev/null 2>&1 &");
    }
}
