<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

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

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('user.html', [
    'alertMsg' => $alertMsg,
    'user' => $user
]);