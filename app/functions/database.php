<?php

function connect()
{
    $pdo = new \PDO("mysql:host=localhost;dbname=phpdevclass;charset=utf8", 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}

function create($table, $fields)
{
    $pdo = connect();

    if (!is_array($fields)) {
        $fields = (array) $fields;
    }

    $sql = "INSERT INTO {$table}";
    $sql .= "(" . implode(', ', array_keys($fields)) . ") ";
    $sql .= "VALUES (:" . implode(', :', array_keys($fields)) . ")";

    $insert = $pdo->prepare($sql);

    return $insert->execute($fields);
}

function all($table)
{
    $pdo = connect();

    $sql = "SELECT * FROM {$table}";
    $list = $pdo->query($sql);

    $list->execute();

    return $list->fetchAll();
}

function update($table, $fields, $where)
{
    if (!is_array($fields)) {
        $fields = (array) $fields;
    }

    $pdo = connect();

    $data = array_map(function ($field) {
        return "{$field} = :{$field}";
    }, array_keys($fields));

    $sql = "update {$table} set ";
    $sql .= implode(', ', $data);
    $sql .= " where {$where[0]} = :{$where[0]}";

    $data = array_merge($fields, [$where[0] => $where[1]]);

    $update = $pdo->prepare($sql);
    $update->execute($data);

    return $update->rowCount();
}

function find($table, $field, $value)
{
    $pdo = connect();

    $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM {$table} WHERE {$field} = :{$field}";

    $find = $pdo->prepare($sql);
    $find->bindValue($field, $value);
    $find->execute();

    return $find->fetch();
}

function delete($table, $field, $value)
{
    $pdo = connect();

    $sql = "delete from {$table} where {$field} = :value";
    $delete = $pdo->prepare($sql);
    $delete->bindValue(':value', $value);

    return $delete->execute();
}
