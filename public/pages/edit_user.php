<?= get('message'); ?>

<?php
$user = find('users', 'id', $_GET['id']);
?>

<form action="/pages/forms/update_user.php" method="POST" role="form">
    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $user->name ?>">
    </div>
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <div class="form-group">
        <label for="name">Sobrenome:</label>
        <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?= $user->sobrenome ?>">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>