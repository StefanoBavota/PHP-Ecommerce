<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();

if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $category = $productMgr->getCategoryById($id)[0];
}

// Submit update
if (isset($_POST['update'])) {

    $name = esc($_POST['name']);

    $productMgr2->updateCategory($id, $name);

    if (($name) > 0) {
        echo "<script>location.href='" . ROOT_URL . "admin?page=others-list';</script>";
        exit;
    } else {
        $alertMsg = 'err';
    }
}
?>

<a href="<?php echo ROOT_URL . 'admin?page=others-list'; ?>" class="back underline">&laquo; Torna alla lista delle specifiche</a>

<h1 class="mt-3">Modifica la Categoria</h1>

<form method="post" class="mt-4">
    <div class="form-group">
        <label for="name">Nome Categoria</label>
        <input name="name" id="name" type="text" class="form-control" value="<?php echo $category['name'] ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $category['id'] ?>">
    <input name="update" type="submit" class="btn btn-primary mt-4" value="Modifica Categoria">
</form>