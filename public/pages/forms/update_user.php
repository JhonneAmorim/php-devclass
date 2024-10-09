<?php
require "../../../bootstrap.php";

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (isEmpty()) {
    flash('message', 'Preencha todos os campos');

    return redirect("edit_user&id={$id}");
}

$validate = validate([
    'name' => 's',
    'email' => 'e',
    'sobrenome' => 's',
]);

$atualizado = update('users', $validate, ['id', $id]);

if ($atualizado) {
    flash('message', 'Usuário atualizado com sucesso', 'success');
    return redirect("edit_user&id={$id}");
}

flash('message', 'Erro ao atualizar usuário', 'danger');
redirect("edit_user&id={$id}");
