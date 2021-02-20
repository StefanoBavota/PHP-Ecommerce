<?php

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$productMgr = new ProductManager();
$products = $productMgr->getAll();
$errorMessage = null;

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

// è colpa di team viewer si loro mi sentono
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

if (isset($_POST['remove'])) {
    // rimuovo prodotto dal db
    $productId = htmlspecialchars(trim($_POST['id']));
    $productMgr->delete_wish($productId);
}

if (isset($user)) {
    $wishlist = $productMgr->getCurrentUserWishlist($user->id);
    $productsCount = $productMgr->countCurrentUserWishlistProductsAmount($user->id)[0]['amount'];
}
?>

<h1>Lista dei desideri</h1>

<div class="row">
    <?php if ($wishlist) : ?>
            <?php foreach ($wishlist as $product) : ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="Card image cap" style="width:100%; height: 20rem; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name'] ?></h5>
                        <h5 class="card-title"><?php echo $product['price']; ?> €</h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <div class="mb-2">
                            <button class="btn btn-secondary btn-sm btn-block rounded-0" onclick="location.href='<?php echo ROOT_URL . 'shop?page=view-product&id=' . $product['product_id']; ?>'">Vedi</button>
                        </div>
                        <div class="mb-2">
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $product['product_id'] ?>">
                                <input name="add_to_cart" type="submit" class="btn btn-primary btn-sm btn-block rounded-0" value="Aggiungi al carrello">
                            </form>
                        </div>
                        <div class="mb-2">
                            <form method="post" class="right">
                                <input type="hidden" name="id" value="<?php echo esc_html($product['wish_list_id']); ?>">
                                <input name="remove" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-danger btn-sm btn-block rounded-0" value="Rimuovi Articolo">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
    <?php else : ?>
        <p>Nessun prodotto disponibile...</p>
    <?php endif; ?>
</div>