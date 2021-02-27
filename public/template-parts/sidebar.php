<?php
//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}


global $alertMsg;
$productMgr = new ProductManager();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
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

<div class="row col-md-3">
    <?php if (isset($user)) : ?>
        <div>
            <div class="jumbotron" style="width: 18rem;">

                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Lista dei desideri</span>
                    <span class="badge bg-secondary rounded-pill text-white"><?php echo $productsCount; ?></span>
                </h4>

                <?php if ($wishlist) : ?>
                    <?php foreach ($wishlist as $product) : ?>
                        <ul class="container-fluid">
                            <li class="list-group-item d-flex justify-content-between lh-sm row">
                                <div class="col-2 delete-container">
                                    <form method="post">
                                        <button class="btn" name="remove"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        <input type="hidden" name="id" value="<?php echo esc_html($product['wish_list_id']); ?>">
                                    </form>
                                </div>

                                <div class="col-10">
                                    <div>
                                        <h6 class="my-0"><?php echo $product['name'] ?></h6>
                                    </div>
                                    <span class="text-muted"><?php echo $product['price']; ?> €</span>
                                </div>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Nessun prodotto disponibile...</p>
                <?php endif; ?>

            </div>

            <form class="card p-2">
                <div class="input-group">
                    <a href="<?php echo ROOT_URL . 'shop/?page=wish-list'; ?>" class="btn btn-primary btn-sm btn-block rounded-0">Visualizza Lista</a>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>