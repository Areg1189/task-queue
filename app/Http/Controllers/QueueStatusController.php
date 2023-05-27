<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class QueueStatusController extends Controller
{
    public function index(Request $request)
    {

        $tasks = Task::orderBy('id', 'desc')->get();

        return view('queue_status', ['tasks' => $tasks]);
    }
}
