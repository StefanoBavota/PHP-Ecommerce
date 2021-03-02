<?php

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$productMgr = new ProductManager();
$products = $productMgr->getAll();
$errorMessage = null;
if (isset($_POST['add_to_wish_list'])) {
    $productId = htmlspecialchars(trim($_POST['id']));

    // ($product_id, $user->id) -> DB ( wish_list )
    $addToWishlistOutcome = $productMgr->addToWishList($productId, $user->id);

    if (isset($addToWishlistOutcome)) {
        $errorMessage = $addToWishlistOutcome['error'];
    }
}

//evitare manipolazioni
if (!defined('ROOT_URL')) {
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
?>

<h2 class="mb-5">Tutti i nostri prodotti</h2>

<div class="row">
    <?php if ($products) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="card ml-3 mb-3" style="width: 18rem;">
                <a href="<?php echo ROOT_URL . 'shop?page=view-product&id=' . $product->id; ?>"><img src="<?php echo $product->image ?>" class="card-img-top" alt="Card image cap" style="width:100%; height: 20rem; object-fit: cover;" ></a>
                <div class="card-body">
                    <h5 class="card-title centro"><?php echo $product->name ?></h5>
                    <h5 class="card-title centro"><?php echo $product->price ?> €</h5>

                    <form method="post" class="centro">
                        <input type="hidden" name="id" value="<?php echo $product->id ?>">
                        <input name="add_to_cart" type="submit" class="btn btn-primary circle" value="Aggiungi al carrello">
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Nessun prodotto disponibile...</p>
    <?php endif; ?>
</div>

<script>
    window.onload = () => {
        <?php
        if ($errorMessage)
            echo "alert(\"$errorMessage\");";
        ?>
    }
</script>