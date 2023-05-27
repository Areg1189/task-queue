<?php

namespace App\Contracts;


interface TaskInterface{
    public function handle(array $payload);
}
