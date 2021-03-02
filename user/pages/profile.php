<?php

if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

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
        echo "<script>location.href='" . ROOT_URL . "shop';</script>";
        exit;
    } else {
        $alertMsg = 'err';
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('profile.html', [
    'user' => $user,
    'address' => $address
]);
