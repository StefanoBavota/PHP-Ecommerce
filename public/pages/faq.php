<?php

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

global $alertMsg;
global $loggedInUser;
$mgr = new UserManager2();

if (isset($_POST['remove'])) {
    $id = trim($_POST['id']);
    $mgr->deleteFaq($id);
}

$faqs = $mgr->getFaq();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('faq.html', [
    'faqs' => $faqs,
    'loggedInUser' => $loggedInUser
]);