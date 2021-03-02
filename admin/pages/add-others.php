<?php
$errMsg = '';

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$cartMgr = new CartItemManager();
global $loggedInUser;

if (isset($_POST['add1'])) {

    $brand = htmlspecialchars(trim($_POST['brand']));

    $id = $productMgr->addBrand($brand);

    if ($brand != '') {

        if ($id > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=add-others&msg=created';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}
if (isset($_POST['add2'])) {

    $category = htmlspecialchars(trim($_POST['category']));

    $id = $productMgr->addCategory($category);

    if ($category != '') {

        if ($id > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=add-others&msg=created';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}
if (isset($_POST['add3'])) {

    $payment = htmlspecialchars(trim($_POST['payment']));

    $id = $cartMgr->addPayment($payment);

    if ($payment != '') {

        if ($id > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=add-others&msg=created';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}
if (isset($_POST['add4'])) {

    $merchant = htmlspecialchars(trim($_POST['merchant']));

    $id = $productMgr->addMerchant($merchant);

    if ($merchant != '') {

        if ($id > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=add-others&msg=created';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}
?>

<div class="separate-top">
    <h2 class="mb-5">Scegli cosa aggiungere</h2>
</div>

<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="heading1">
            <h5 class="mb-0">
                <button class="btn btn-link scuro" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Nuovo Brand
                </button>
            </h5>
        </div>

        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <label for="brand">Nome Brand</label>
                    <form method="post">
                        <input name="brand" id="brand" type="text" class="form-control">
                        <button class="btn btn-primary mt-3" type="submit" name="add1">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading3">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Nuova Categoria
                </button>
            </h5>
        </div>
        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <label for="category">Nome Categoria</label>
                    <form method="post">
                        <input name="category" id="category" type="text" class="form-control">
                        <button class="btn btn-primary mt-3" type="submit" name="add2">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading5">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    Nuovo Metodo di pagamento
                </button>
            </h5>
        </div>
        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <label for="payment">Metodo di Pagamento</label>
                    <form method="post">
                        <input name="payment" id="payment" type="text" class="form-control">
                        <button class="btn btn-primary mt-3" type="submit" name="add3">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading7">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                    Nuovo Fornitore
                </button>
            </h5>
        </div>
        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <label for="merchant">Nome fornitore</label>
                    <form method="post">
                        <input name="merchant" id="merchant" type="text" class="form-control">
                        <button class="btn btn-primary mt-3" type="submit" name="add4">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>