<?php

function connect()
{
    $pdo = new \PDO("mysql:host=localhost;dbname=phpdevclass;charset=utf8", 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

function create() {}

function update() {}

function find() {}

function delete() {}
