<h2>Contato</h2>

<?= get('message') ?>

<form action="/pages/forms/contato.php" method="POST" role="form">

    <div class="form-group">
        <label for="">Nome</label>
        <input name="name" type="text" class="form-control" placeholder="Digite seu nome">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input name="email" type="text" class="form-control" placeholder="Digite seu email">
    </div>

    <div class="form-group">
        <label for="">Assunto</label>
        <input name="subject" type="text" class="form-control" placeholder="Digite o assunto">
    </div>

    <div class="form-group">
        <label for="">Mensagem</label>
        <textarea name="message" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>