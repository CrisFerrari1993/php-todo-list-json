<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $jsonTodos = file_get_contents('todos.json');
    echo $jsonTodos;
?>