<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $todos = [
        [
            'task' => 'Buy Groceries',
        ],
        [
            'task' => 'Walk the dog',
        ],
        [
            'task' => 'Wash the car',
        ],
        [
            'task' => 'Work on new application project',
        ],
        [
            'task' => 'Read new vue book',
        ],
        [
            'task' => 'Find answer to 42 question',
        ],
    ];

    $jsonTodos = json_encode($todos);
    echo $jsonTodos;
?>