<?php

function validate(array $fields)
{
    $validate = [];

    foreach ($fields as $field => $type) {
        switch ($type) {
            case 's':
                $validate[$field] = filter_var($_POST[$field], FILTER_SANITIZE_STRING);
                break;
            case 'e':
                $validate[$field] = filter_var($_POST[$field], FILTER_VALIDATE_EMAIL);
                break;
            case 'i':
                $validate[$field] = filter_var($_POST[$field], FILTER_VALIDATE_INT);
                break;
        }
    }

    return (object) $validate;
}