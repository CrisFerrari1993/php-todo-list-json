<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $todos = [
        [
            'task' => 'Buy Groceries',
            'done' =>  true,
        ],
        [
            'task' => 'Walk the dog',
            'done' => false,
        ],
        [
            'task' => 'Wash the car',
            'done' =>  true,
        ],
        [
            'task' => 'Work on new application project',
            'done' =>  true,
        ],
        [
            'task' => 'Read new vue book',
            'done' => false,
        ],
        [
            'task' => 'Find answer to 42 question',
            'done' =>  true,
        ],
    ];

    $jsonTodos = json_encode($todos);
    echo $jsonTodos;
?>