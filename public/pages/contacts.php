<?php

$errMsg = '';

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$userMgr = new UserManager();

if (isset($_POST['send'])) {

    $nome = htmlspecialchars(trim($_POST['nome']));
    $cognome = htmlspecialchars(trim($_POST['cognome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $msg = htmlspecialchars(trim($_POST['msg']));

    $id = $userMgr->addToContactUs($nome, $cognome, $email, $msg, $user->id);

    if ($id > 0) {
        echo '<script>location.href="' . ROOT_URL . 'public"</script>';
        exit;
    } else {
        $alertMsg = 'err';
    }
}

?>

<h1 class="separate-top">Contattaci</h1>

<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input name="nome" id="nome" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="cognome">Cognome</label>
        <input name="cognome" id="cognome" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" id="email" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="msg">Messaggio</label>
        <textarea rows="7" name="msg" id="msg" type="text" class="form-control"></textarea>
    </div>

    <hr class=mb-4>

    <form method="post">
        <input type="hidden" name="send">
        <button class="btn btn-primary rounded-0">Invia il Messaggio</button>
    </form>
</form>