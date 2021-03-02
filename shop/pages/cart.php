<?php

$cm = new CartManager();
$cm2 = new CartItemManager();
$cartId = $cm->getCurrentCartId();

if (isset($_POST['minus'])) {
    // rimuovo dal carrello
    $productId = htmlspecialchars(trim($_POST['id']));
    $cm->removeFromCart($productId, $cartId);
}

if (isset($_POST['plus'])) {
    // aggiungo dal carrello
    $productId = htmlspecialchars(trim($_POST['id']));
    $cm->addToCart($productId, $cartId);
}

$cart_total = $cm->getCartTotal($cartId);
$cart_items = $cm->getCartItems($cartId);
$payments = $cm2->getAllPayment();

?>

<div class="col-12 order-md-last mb-4 separate-top">

    <?php if (count($cart_items) > 0) : ?>

        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Carrello</span>
            <span class="badge bg-secondary rounded-pill text-white"><?php echo $cart_total['num_products'] ?> elementi nel carrello</span>
        </h4>

        <ul class="list-group mb-3">

            <?php foreach ($cart_items as $item) : ?>
                <li class="list-group-item d-flex justify-content-between lh-sm p-4">
                    <div class="row w-100">
                        <div class="col-lg-4 col-6">
                            <h6 class="my-0"><?php echo $item['name'] ?></h6>
                        </div>
                        <div class="col-lg-2 col-6">
                            <span class="text-muted">€ <?php echo $item['single_price'] ?></span>
                        </div>
                        <div class="col-lg-4 col-6">
                            <form method="post">
                                <div class="cart-buttons btn-group" role="group">
                                    <button name="minus" type="submit" class="btn btn-sm btn-primary">-</button>
                                    <span class="text-muted"><?php echo $item['quantity'] ?></span>
                                    <button name="plus" type="submit" class="btn btn-sm btn-primary">+</button>
                                    <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2 col-6">
                            <strong class="text-primary">€ <?php echo $item['total_price'] ?></strong>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>

            <li class="cart-total list-group-item d-flex justify-content-between p-4">
                <div class="row w-100">
                    <div class="col-lg-4 col-6 mb-3">
                        <span>Totale</span>
                    </div>
                    <div class="col-lg-6 lg-screen"></div>
                    <div class="col-lg-2 col-6">
                        <span>€ <?php echo $cart_total['total'] ?></span>
                    </div>
                </div>
            </li>

        </ul>

        <hr>

        <?php if ($loggedInUser) : ?>
            <label for="category_id">Metodo di pagamento</label>
            <div class="col-4 mb-4 mt-1">
                <select name="payment" id="payment" type="text" class="form-control scuro" value="<?php echo $payments['id']; ?>">
                    <option value="0"> - Seleziona un Metodo di pagamento - </option>
                    <?php if ($payments) : ?>
                        <?php foreach ($payments as $payment) : ?>

                            <option class="scuro" value="<?php echo $payment['id']; ?>"><?php echo $payment['type']; ?></option>

                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Nessuna categoria disponibile</p>
                    <?php endif; ?>
                </select>
            </div>
            
            <hr>

            <a onclick="return confirm('Confermi invio ordine?');" class="btn btn-primary btn-block" href="<?php echo ROOT_URL . 'shop?page=checkout' ?>">Invia Ordine</a>
        <?php else : ?>
            <a class="btn btn-primary btn-block" href="<?php echo ROOT_URL . 'auth?page=register' ?>">Registrati per effettuare ordine</a>
        <?php endif; ?>

    <?php else : ?>
        <p class="lead separate-top">Nessun elemento nel carrello... </p>
        <a href="<?php echo ROOT_URL ?>shop/?page=products-list" class="btn btn-primary">Torna a fare acquisti &raquo;</a>
    <?php endif; ?>

</div>