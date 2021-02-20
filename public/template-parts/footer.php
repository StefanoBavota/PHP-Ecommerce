<?php

$cm = new CartManager();
$cartId = $cm->getCurrentCartId();

$cart_total = $cm->getCartTotal($cartId);

?>

<!-- FOOTER -->
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>
<!-- END FOOTER -->

<script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
<script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo ROOT_URL; ?>assets/js/main.js"></script>
<script>
    $(document).ready(function() {
        $('.js-totCartItems').html('<?php echo $cart_total['num_products'] ?>');
    });
</script>
</body>

</html>