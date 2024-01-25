<?php

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
    file_put_contents("todos.json", $jsonTodos);

    echo "File successful created!";

?>