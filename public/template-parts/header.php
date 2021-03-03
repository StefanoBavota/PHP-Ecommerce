<?php

if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

global $loggedInUser;

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('header.html', [
    'loggedInUser' => $loggedInUser
]);
