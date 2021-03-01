<?php

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

global $alertMsg;
$productMgr = new ProductManager();

if (isset($_POST['remove'])) {
    // rimuovo prodotto dal db
    $productId = htmlspecialchars(trim($_POST['id']));
    $productMgr->delete($productId);
    $alertMsg = 'deleted';
}

$products = $productMgr->getAll();
?>

<div class="row">

    <?php if ($products) : ?>
        <?php foreach ($products as $product) : ?>

            <div class="card ml-3 mb-3" style="width: 18rem;">
                <img src="<?php echo $product->image ?>" class="card-img-top" alt="..." style="width:100%; height: 20rem; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product->name ?></h5>
                    <h5 class="card-title"><?php echo $product->price ?> €</h5>
                    <p class="card-text"><?php echo $product->description ?></p>
                    <a class="btn btn-primary btn-sm btn-block rounded-0" href="<?php echo ROOT_URL . 'admin?page=edit-product'; ?>&id=<?php echo esc_html($product->id); ?>">Modifica Articolo</a>
                    <form method="post" class="right">
                        <input type="hidden" name="id" value="<?php echo esc_html($product->id); ?>">
                        <input name="remove" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-danger btn-sm btn-block rounded-0" value="Rimuovi Articolo">
                    </form>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else : ?>
        <p>Nessun prodotto disponibile...</p>
    <?php endif; ?>

</div>