<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $jsonTodos = file_get_contents("todos.json");
    $todos = json_decode($jsonTodos, true);

    $text = $_POST['text'];
   

    $newTodo = [
        'task' => $text,
        'done' => false,
    ];

    $todos[] = $newTodo;
    $jsonTodos = json_encode($todos);

    file_put_contents("todos.json", $jsonTodos);
    echo $jsonTodos;