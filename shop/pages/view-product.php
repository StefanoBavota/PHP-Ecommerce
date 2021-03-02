<?php

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

// in caso l'id non ci fosse reindirizza alla home page
if (!isset($_GET['id'])) {
    echo "<script>location.href='" . ROOT_URL . "';</script>";
    exit;
}

$pm = new ProductManager();
$cm = new CartManager();
$errorMessage = null;

if (isset($_POST['add_to_cart'])) {

    $productId = htmlspecialchars(trim($_POST['id']));
    
    $cartId = $cm->getCurrentCartId();

    $cm->addToCart($productId, $cartId);
}

if (isset($_POST['add_to_wish_list'])) {
    $productId = htmlspecialchars(trim($_POST['id']));

    // ($product_id, $user->id) -> DB ( wish_list )
    $addToWishlistOutcome = $pm->addToWishList($productId, $user->id);

    if (isset($addToWishlistOutcome)) {
        $errorMessage = $addToWishlistOutcome['error'];
    }
}

$id = htmlspecialchars(trim($_GET['id']));
$product = $pm->get($id);

// in caso l'id fosse errato reindirizza alla home page
if (!(property_exists($product, 'id'))) {
    echo "<script>location.href='" . ROOT_URL . "';</script>";
    exit;
}
?>

<div class="jumbotron separate-top view-product-container">
    <img src="<?php echo $product->image ?>" class="card-img-top" style="width:100%; height: 30rem; object-fit: none; object-position: 50% 75%;">
    <div class="card-body">
        <h1 class="display-5"><?php echo $product->name ?></h1>
        <p class="card-text"><?php echo $product->description ?></p>
        <hr class="my-4">
        <p class="lead">Prezzo: <?php echo $product->price ?> €</p>
        <form method="post">
            <input name="id" type="hidden" value="<?php echo $product->id ?>">
            <input name="add_to_cart" type="submit" class="btn btn-primary right mb-2" value="Aggiungi al carrello">
        </form>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
            <input type="hidden" name="add_to_wish_list">
            <?php if ($loggedInUser) : ?>
                <button class="btn btn-info">Aggiungi alla Lista</button>
            <?php endif; ?>
        </form>
    </div>
</div>