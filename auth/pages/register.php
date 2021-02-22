<?php

$errMsg = '';

if ($loggedInUser) {
    echo '<script>location.href="' . ROOT_URL . 'public"</script>';
    exit;
}

if (isset($_POST['register'])) {

    $email = htmlspecialchars(trim($_POST['email']));
    $nome = htmlspecialchars(trim($_POST['nome']));
    $cognome = htmlspecialchars(trim($_POST['cognome']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

    $street = esc($_POST['street']);
    $city = esc($_POST['city']);
    $cap = esc($_POST['cap']);

    $userMgr = new UserManager();
    if ($userMgr->passwordMatch($password, $confirm_password)) {

        $result = $userMgr->register($nome, $cognome, $email, $password);
        if(isset($_POST['newsletter_checked']) && $_POST['newsletter_checked'] === 'on'){
            $userMgr->addToNewletter($email);
        }

        if ($result > 0) {
            $userMgr->createAddress($result, $street, $city, $cap);

            echo '<script>location.href="' . ROOT_URL . 'auth?page=login"</script>';
            exit;
        } else {
            $errMsg = 'Mail già utilizzata...';
        }
    } else {
        $errMsg = "Le password non corrsipondono...";
    }
}
?>

<h2>Registrazione</h2>

<form method="post">
    <h5 class="mb-3 mt-3">Informazioni personali</h5>
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
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="confirm_password">Conferma Password</label>
        <input name="confirm_password" id="confirm_password" type="password" class="form-control">
    </div>

    <hr class=mb-4>

    <h5 class="mb-3 mt-3">Indirizzo di spedizione</h5>
    <div class="mb-3">
        <label for="street">Via</label>
        <input name="street" type="text" class="form-control" id="street">
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="city">Città</label>
            <input name="city" type="text" class="form-control" id="city">
        </div>
        <div class="col-md-4 mb-3">
            <label for="cap">CAP</label>
            <input name="cap" type="text" class="form-control" id="cap">
        </div>
    </div>

    <hr>

    <h5 class="mb-3 mt-3">Newsletter</h5>
    <div class="form-check">
        <input class="form-check-input" name="newsletter_checked" type="checkbox" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            <h5>Iscrivti alla Newsletter</h5>
        </label>
    </div>

    <hr>

    <button class="btn btn-primary mb-5 mt-3" type="submit" name="register">Register</button>
</form>

Hai già un account? <a href="<?php echo ROOT_URL ?>auth?page=login">Effettua il Login! &raquo;</a>