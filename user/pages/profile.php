<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

if (!$loggedInUser) {
    echo "<script>location.href='" . ROOT_URL . "auth?page=login&msg=login_for_checkout';</script>";
    exit;
}

global $alertMsg;
global $loggedInUser;
$userId = $loggedInUser->id;

$mgr = new UserManager();
$user = $mgr->get($userId);
$address = $mgr->getAddress($userId)[0];

// Submit update
if (isset($_POST['update'])) {

    $nome = esc($_POST['nome']);
    $cognome = esc($_POST['cognome']);
    $email = esc($_POST['email']);
    $id = esc($_POST['id']);

    $street = esc($_POST['street']);
    $city = esc($_POST['city']);
    $cap = esc($_POST['cap']);

    $user = $mgr->updateUser($userId, $nome, $cognome, $email);
    $address = $mgr->updateAddress($userId, $street, $city, $cap);

    if (($user && $address) > 0) {
        echo "<script>location.href='" . ROOT_URL . "public/?page=homepage&msg=updated';</script>";
        exit;
    } else {
        $alertMsg = 'err';
    }
}
?>

<div style="margin-top: 70px;">
    <div class="mb-4">
        <a href="<?php echo ROOT_URL; ?>" class="back underline separate-top scuro">&laquo; Home</a>
    </div>

    <h1>Modifica dati personali</h1>

    <form method="post" class="mt-4">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input name="nome" id="nome" type="text" class="form-control" value="<?php echo esc_html($user->nome); ?>">
        </div>
        <div class="form-group">
            <label for="cognome">Cognome</label>
            <input name="cognome" id="cognome" type="text" class="form-control" value="<?php echo esc_html($user->cognome); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" id="email" type="text" class="form-control" value="<?php echo esc_html($user->email); ?>">
        </div>
        <div class="form-group">
            <label for="street">Indirizzo</label>
            <input name="street" id="street" type="text" class="form-control" value="<?php echo $address['street']; ?>">
        </div>
        <div class="form-group">
            <label for="city">Città</label>
            <input name="city" id="city" type="text" class="form-control" value="<?php echo $address['city']; ?>">
        </div>
        <div class="form-group">
            <label for="cap">Cap</label>
            <input name="cap" id="cap" type="text" class="form-control" value="<?php echo $address['cap']; ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo esc_html($userId); ?>">
        <input name="update" type="submit" class="btn btn-primary mt-4 mb-5" value="Modifica Utente">
    </form>
</div>