<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();

if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $brand = $productMgr->getBrandById($id)[0];
}

// Submit update
if (isset($_POST['update'])) {

    $name = esc($_POST['name']);

    $res = $productMgr2->updateBrand($id, $name);

    if (($res) > 0) {
        echo "<script>location.href='" . ROOT_URL . "admin?page=others-list';</script>";
        exit;
    } else {
        $alertMsg = 'err';
    }
}

?>

<div class="mt-5 mb-4">
    <a href="<?php echo ROOT_URL . 'admin?page=others-list'; ?>" class="back underline scuro">&laquo; Torna alla lista delle specifiche</a>
</div>

<h1 class="mt-3">Modifica Brand</h1>

<form method="post" class="mt-4">
    <div class="form-group">
        <label for="name">Nome Brand</label>
        <input name="name" id="name" type="text" class="form-control" value="<?php echo $brand['name'] ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $brand['id'] ?>">
    <input name="update" type="submit" class="btn btn-primary mt-4" value="Modifica Brand">
</form>