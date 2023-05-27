<?php

namespace App\Http\Controllers;

use App\Services\QueueManager;
use App\Tasks\ExampleTask1;
use Illuminate\Http\Request;

class ExampleTask1Controller extends Controller
{
    public function addTask(Request $request)
    {
        $queueManager = new QueueManager();
        $queueManager->addTask(ExampleTask1::class, [
            // Add any task-specific parameters here if needed
        ]);

        return response()->json(['message' => 'Task1 added to the queue.']);
    }
}
