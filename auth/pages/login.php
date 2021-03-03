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

if (isset($_POST['login'])) {

    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $userMgr = new UserManager();
    $result = $userMgr->login($email, $password);

    if ($result) {
        echo '<script>location.href="' . ROOT_URL . 'shop"</script>';
        exit;
    } else {
        $errMsg = 'Login Fallito...';
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('login.html', [
    'errMsg' => $errMsg
]);
