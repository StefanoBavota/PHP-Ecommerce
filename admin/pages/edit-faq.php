<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$mgr = new UserManager2();

if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $faq = $mgr->getFaqById($id)[0];
}

// Submit update
if (isset($_POST['update'])) {

    $title = esc($_POST['title']);
    $text = esc($_POST['text']);

    $user = $mgr->updateFaq($id, $title, $text);

    if (($title && $text) > 0) {
        echo "<script>location.href='" . ROOT_URL . "public/?page=faq';</script>";
        exit;
    } else {
        $alertMsg = 'err';
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('edit-faq.html', [
    'faq' => $faq
]);