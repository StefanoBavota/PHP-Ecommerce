<?php

    //evitare manipolazioni
    if (!defined('ROOT_URL')){
        die;
    }

    $productMgr = new ProductManager();
    $products = $productMgr->getAll();

?>
<div class="row">

    <?php if($products) : ?>
        <?php foreach($products as $product) : ?>

            <div class="card" style="width: 18rem;">
                <img src="<?php echo $product->image ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product->name ?></h5>
                    <h5 class="card-title"><?php echo $product->price ?> €</h5>
                    <p class="card-text"><?php echo $product->description ?></p>
                    <button class="btn btn-primary btn-sm btn-block rounded-0" onclick="location.href='<?php echo ROOT_URL . 'admin?page=product'?>'">Modifica Articolo</button>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else : ?>
        <p>Nessun prodotto disponibile...</p>
    <?php endif; ?>

</div>