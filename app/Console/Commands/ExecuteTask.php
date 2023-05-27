<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class ExecuteTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:execute {taskId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute a task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $taskId = $this->argument('taskId');

        // Retrieve the task by ID
        $task = Task::where('id', $taskId)->first();

        $taskClass = $task->class_name;
        $payload = json_decode($task->payload, true);
        $completed = 0;
        try {
            $taskInstance = new $taskClass();
            $taskInstance->handle($payload);
            $task->status = 'completed';
            $completed = 1;
        } catch (\Exception $e) {
            $task->status = 'failed';
        }
        $task->save();
        return $completed;
    }
}
