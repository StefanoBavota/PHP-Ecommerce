<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();
$cartMgr = new CartItemManager();

if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $payment = $cartMgr->getPaymentById($id)[0];
}

// Submit update
if (isset($_POST['update'])) {

    $type = esc($_POST['type']);

    $res = $cartMgr->updatePayment($id, $type);

    if (($res) > 0) {
        echo "<script>location.href='" . ROOT_URL . "admin/?page=others-list';</script>";
        exit;
    } else {
        $alertMsg = 'err';
    }
}
?>

<div class="mt-5 mb-4">
    <a href="<?php echo ROOT_URL . 'admin?page=others-list'; ?>" class="back underline">&laquo; Torna alla lista delle specifiche</a>
</div>

<h1 class="mt-3">Modifica Metodo di pagamento</h1>

<form method="post" class="mt-4">
    <div class="form-group">
        <label for="type">Metodo di pagamento</label>
        <input name="type" id="type" type="text" class="form-control" value="<?php echo $payment['type'] ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $payment['id'] ?>">
    <input name="update" type="submit" class="btn btn-primary mt-4" value="Modifica Metodo di pagamento">
</form>