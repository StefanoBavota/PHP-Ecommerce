<?php

if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

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
        if ($email != '' && $nome != '' && $cognome != '' && $password != '' && $confirm_password != '' && $street != '' && $city != '' && $cap != '') {


            $result = $userMgr->register($nome, $cognome, $email, $password);
            if (isset($_POST['newsletter_checked']) && $_POST['newsletter_checked'] === 'on') {
                $userMgr->addToNewletter($email);
            }

            if ($result > 0) {
                $userMgr->createAddress($result, $street, $city, $cap);
                $userMgr->initializePoints($result);

                echo '<script>location.href="' . ROOT_URL . 'auth?page=login"</script>';
                exit;
            } else {
                $errMsg = 'Mail già utilizzata...';
            }
        }
    } else {
        $errMsg = "Le password non corrsipondono...";
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('register.html', [
    'errMsg' => $errMsg
]);