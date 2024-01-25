<?php

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
    file_put_contents("todos.json", $jsonTodos);

    echo "File successful created!";

?>