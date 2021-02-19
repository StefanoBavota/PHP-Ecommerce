
<?php

//evitare manipolazioni
if (!defined('ROOT_URL')){
    die;
}

if (isset($_POST['add_to_cart'])) {

    // aggiungi al carrello
    $productId = htmlspecialchars(trim($_POST['id']));
    // addToCart logic
    $cm = new CartManager();
    $cartId = $cm->getCurrentCartId();

    // aggiungi al carrello "cartId" il prodotto "productId"
    $cm->addToCart($productId, $cartId);

    // echo 'ok aggiunto';
}

$productMgr = new ProductManager();
$products = $productMgr->getAll();

?>

<div class="row">

<?php if($products) : ?>
    <?php foreach($products as $product) : ?>
    
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $product->image ?>" class="card-img-top" alt="Card image cap" style="width:300px;height:300px;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product->name ?></h5>
                <h5 class="card-title"><?php echo $product->price ?> €</h5>
                <p class="card-text"><?php echo $product->description ?></p>
                <button class="btn btn-secondary btn-sm btn-block rounded-0" onclick="location.href='<?php echo ROOT_URL . 'shop?page=view-product&id=' . $product->id; ?>'">Vedi</button>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $product->id ?>">
                    <input name="add_to_cart" type="submit" class="btn btn-primary btn-sm btn-block rounded-0" value="Aggiungi al carrello">
                </form>
            </div>
    </div>

    <?php endforeach; ?>
<?php else : ?>
    <p>Nessun prodotto disponibile...</p>
<?php endif; ?>

</div>