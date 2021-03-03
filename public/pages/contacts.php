<?php

$errMsg = '';

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

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
        echo '<script>location.href="' . ROOT_URL . 'shop"</script>';
        exit;
    } else {
        $alertMsg = 'err';
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('contacts.html', []);