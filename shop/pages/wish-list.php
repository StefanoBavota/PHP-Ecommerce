<?php

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$productMgr = new ProductManager();
$products = $productMgr->getAll();
$errorMessage = null;

if (!defined('ROOT_URL')) {
    die;
}

if (isset($_POST['add_to_cart'])) {

    $productId = htmlspecialchars(trim($_POST['id']));
    $wishId = htmlspecialchars(trim($_POST['id_wish']));
    $productMgr->delete_wish($wishId);

    $cm = new CartManager();
    $cartId = $cm->getCurrentCartId();

    $cm->addToCart($productId, $cartId);
}

if (isset($_POST['remove'])) {
    $productId = htmlspecialchars(trim($_POST['id']));
    $productMgr->delete_wish($productId);
}

if (isset($user)) {
    $wishlist = $productMgr->getCurrentUserWishlist($user->id);
    $productsCount = $productMgr->countCurrentUserWishlistProductsAmount($user->id)[0]['amount'];
}
?>

<h1 class="separate-top mb-3">Lista dei desideri</h1>

<div class="row">
    <?php if ($wishlist) : ?>
            <?php foreach ($wishlist as $product) : ?>
                <div class="card ml-3 mb-3" style="width: 18rem;">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="Card image cap" style="width:100%; height: 20rem; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name'] ?></h5>
                        <h5 class="card-title"><?php echo $product['price']; ?> €</h5>
                        <div class="mb-2">
                            <button class="btn btn-secondary btn-sm btn-block rounded-0" onclick="location.href='<?php echo ROOT_URL . 'shop?page=view-product&id=' . $product['product_id']; ?>'">Vedi</button>
                        </div>
                        <div class="mb-2">
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $product['product_id'] ?>">
                                <input type="hidden" name="id_wish" value="<?php echo $product['wish_list_id']; ?>">
                                <input name="add_to_cart" type="submit" class="btn btn-primary btn-sm btn-block rounded-0" value="Aggiungi al carrello">
                            </form>
                        </div>
                        <div class="mb-2">
                            <form method="post" class="right">
                                <input type="hidden" name="id" value="<?php echo $product['wish_list_id']; ?>">
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