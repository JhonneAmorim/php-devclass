<?php
require "../../../bootstrap.php";

if (isEmpty()) {
    flash('message', 'Preencha todos os campos');

    return redirect("create_user");
}

$validate = validate([
    'name' => 's',
    'email' => 'e',
    'sobrenome' => 's',
    'password' => 's'
]);

$cadastrado = create('users', $validate);

if ($cadastrado) {
    flash('message', 'Usuário cadastrado com sucesso', 'success');
    return redirect("create_user");
}

flash('message', 'Erro ao cadastrar usuário', 'error');
return redirect("create_user");
