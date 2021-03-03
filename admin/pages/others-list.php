<?php
$errMsg = '';

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$cartMgr = new CartItemManager();

if (isset($_POST['delete1'])) {
    $id = trim($_POST['id']);
    $productMgr->deleteBrand($id);
}

if (isset($_POST['delete2'])) {
    $id = trim($_POST['id']);
    $productMgr->deleteCategory($id);
}

if (isset($_POST['delete3'])) {
    $id = trim($_POST['id']);
    $cartMgr->deletePayment($id);
}

if (isset($_POST['delete4'])) {
    $id = trim($_POST['id']);
    $productMgr->deleteMerchant($id);
}

$allBrand = $productMgr->getAllBrand();
$allCategory = $productMgr->getAllCategory();
$allPayment = $cartMgr->getAllPayment();
$allMerchant = $productMgr->getAllMerchant();

?>

<h2 class="mb-5">Modifica Specifiche</h2>

<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="heading1">
            <h5 class="mb-0">
                <button class="btn btn-link scuro" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Modifica Brand
                </button>
            </h5>
        </div>

        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <?php if (count($allBrand) > 0) : ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="big-screen">Nome Brand</th>
                                    <th scope="col" class="right">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allBrand as $brand) : ?>
                                    <tr>
                                        <td class="big-screen"><?php echo $brand['name']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm left" href="<?php echo ROOT_URL . 'admin?page=edit-brand'; ?>&id=<?php echo $brand['id']; ?>">Modifica</a>
                                            <form method="post" class="right">
                                                <input type="hidden" name="id" value="<?php echo $brand['id']; ?>">
                                                <input name="delete1" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-outline-danger btn-sm" value="Elimina">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Nessun Utente presente...</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading3">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed scuro" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Modifica Categoria
                </button>
            </h5>
        </div>
        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <?php if (count($allCategory) > 0) : ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="big-screen">Nome Categoria</th>
                                    <th scope="col" class="right">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allCategory as $category) : ?>
                                    <tr>
                                        <td class="big-screen"><?php echo $category['name']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm left" href="<?php echo ROOT_URL . 'admin?page=edit-category'; ?>&id=<?php echo $category['id']; ?>">Modifica</a>
                                            <form method="post" class="right">
                                                <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                                <input name="delete2" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-outline-danger btn-sm" value="Elimina">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Nessun Utente presente...</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading5">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed scuro" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    Modifica Metodo di pagamento
                </button>
            </h5>
        </div>
        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <?php if (count($allPayment) > 0) : ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="big-screen">Metodo di Pagamento</th>
                                    <th scope="col" class="right">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allPayment as $payment) : ?>
                                    <tr>
                                        <td class="big-screen"><?php echo $payment['type']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm left" href="<?php echo ROOT_URL . 'admin?page=edit-payment'; ?>&id=<?php echo $payment['id']; ?>">Modifica</a>
                                            <form method="post" class="right">
                                                <input type="hidden" name="id" value="<?php echo $payment['id']; ?>">
                                                <input name="delete3" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-outline-danger btn-sm" value="Elimina">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Nessun Utente presente...</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading7">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed scuro" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                    Modifica Fornitore
                </button>
            </h5>
        </div>
        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <?php if (count($allMerchant) > 0) : ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="big-screen">Nome Fornitore</th>
                                    <th scope="col" class="right">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allMerchant as $merchant) : ?>
                                    <tr>
                                        <td class="big-screen"><?php echo $merchant['name']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm left" href="<?php echo ROOT_URL . 'admin?page=edit-merchant'; ?>&id=<?php echo $merchant['id']; ?>">Modifica</a>
                                            <form method="post" class="right">
                                                <input type="hidden" name="id" value="<?php echo $merchant['id']; ?>">
                                                <input name="delete4" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-outline-danger btn-sm" value="Elimina">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Nessun Utente presente...</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>