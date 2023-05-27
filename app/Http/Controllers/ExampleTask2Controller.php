<?php

namespace App\Http\Controllers;

use App\Services\QueueManager;
use App\Tasks\ExampleTask2;
use Illuminate\Http\Request;

class ExampleTask2Controller extends Controller
{
    public function addTask(Request $request)
    {
        $queueManager = new QueueManager();
        $queueManager->addTask(ExampleTask2::class, []);

        return response()->json(['message' => 'Task2 added to the queue.']);
    }
}
