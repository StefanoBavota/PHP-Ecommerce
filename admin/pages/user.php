<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

global $alertMsg;
$mgr = new UserManager();
$user = new User(0, '', '', '', '');

// Querystring param id
if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $user = $mgr->get($id);
}

// Submit update
if (isset($_POST['update'])) {

    $nome = trim($_POST['nome']);
    $cognome = trim($_POST['cognome']);
    $email = trim($_POST['email']);
    $user_type_id = trim($_POST['user_type_id']);
    $id = trim($_POST['id']);

    if ($id != '' && $id != '0' && $nome != '' && $cognome != '' && $email != '' && $user_type_id != '') {

        $numUpdated = $mgr->update(new User($id, $nome, $cognome, $email, $user_type_id), $id);

        if ($numUpdated > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=users-list&msg=updated';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}
?>

<a href="<?php echo ROOT_URL . 'admin?page=users-list'; ?>" class="back underline">&laquo; Lista Utenti</a>

<h1>Modifica Utente</h1>

<form method="post" class="mt-5">
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
        <label for="user_type_id">Tipo Utente</label>
        <select name="user_type_id" id="user_type_id" type="text" class="form-control" value="<?php echo esc_html($user->user_type_id); ?>">
            <option value=""> - Seleziona - </option>
            <option <?php if ($user->user_type_id == '1') echo 'selected'; ?> value="1">Amministratore</option>
            <option <?php if ($user->user_type_id == '2') echo 'selected'; ?> value="2">Utente</option>
        </select>
    </div>
    <input type="hidden" name="id" value="<?php echo esc_html($user->id); ?>">
    <input name="update" type="submit" class="btn btn-primary" value="Modifica Utente">
</form>