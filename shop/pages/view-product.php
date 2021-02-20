<?php

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}


// in caso l'id non ci fosse reindirizza alla home page
if (!isset($_GET['id'])) {
    echo "<script>location.href='" . ROOT_URL . "';</script>";
    exit;
}

if (isset($_POST['add_to_cart'])) {

    $productId = htmlspecialchars(trim($_POST['id']));
    // addToCart logic
    $cm = new CartManager();
    $cartId = $cm->getCurrentCartId();

    // aggiungi al carrello "cartId" il prodotto "productId"
    $cm->addToCart($productId, $cartId);

    // stampato un messaggio per l'utente es. ellem aggiunto al carrello
    // echo 'ok';
}

$id = htmlspecialchars(trim($_GET['id']));

$pm = new ProductManager();
$product = $pm->get($id);

// in caso l'id fosse errato reindirizza alla home page
if (!(property_exists($product, 'id'))) {
    echo "<script>location.href='" . ROOT_URL . "';</script>";
    exit;
}
?>

<div class="jumbotron">
    <img src="<?php echo $product->image ?>" class="card-img-top" style="width:100%; height: 25rem; object-fit: cover;">
    <div class="card-body">
        <h1 class="display-5"><?php echo $product->name ?></h1>
        <p class="card-text"><?php echo $product->description ?></p>
        <hr class="my-4">
        <p class="lead">Prezzo: <?php echo $product->price ?> €</p>
        <form method="post">
            <input name="id" type="hidden" value="26">
            <input name="add_to_cart" type="submit" class="btn btn-primary right" value="Aggiungi al carrello">
        </form>
    </div>
</div>