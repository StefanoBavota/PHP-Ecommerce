<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

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
?>

<div class="mt-5 mb-4">
    <a href="<?php echo ROOT_URL . "public/?page=faq"; ?>" class="back underline">&laquo; FAQ</a>
</div>

<h1 class="mt-3">Modifica FAQ</h1>

<form method="post" class="mt-4">
    <div class="form-group">
        <label for="title">Titolo</label>
        <input name="title" id="title" type="text" class="form-control" value="<?php echo $faq['title'] ?>">
    </div>
    <div class="form-group">
        <label for="text">Testo</label>
        <textarea rows="7" name="text" id="text" type="text" class="form-control"><?php echo $faq['text'] ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $faq['id'] ?>">
    <input name="update" type="submit" class="btn btn-primary mt-4" value="Modifica FAQ">
</form>