<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

if (!$loggedInUser) {
    echo "<script>location.href='" . ROOT_URL . "auth?page=login&msg=login_for_checkout';</script>";
    exit;
}

global $loggedInUser;

$userId = $loggedInUser->id;
$orderMgr = new OrderManager();
$status = 'pending';
$pendingOrders = $orderMgr->getOrdersOfUser($userId, 'pending');
$status = 'shipped';
$shippedOrders = $orderMgr->getOrdersOfUser($userId, $status);
$points = $orderMgr->totalInPoints($userId);

$count = 0;
?>

<div class="separate-top">
    <h1 cass="mb-4">
        I miei punti:
        <?php if ((int)$points > 0) :  ?>
            <span class="badge bg-info rounded-pill text-white">
                <?php echo $points; ?>
            </span>
        <?php else : ?>
            <span class="badge bg-info rounded-pill text-white">0</span>
        <?php endif; ?>
    </h1>

    <h5 class="card-title mb-4">Ogni volta che completi un acquisto il tuo punteggio incrementa di 5 punti!</h5>

    <hr>

    <h1 cass="mb-4">I miei ordini</h1>

    <?php if (count($pendingOrders) > 0) :  ?>
        <table class="table table-bordered">
            <tr>
                <th class="big-screen">#</th>
                <th>Num.Ordine</th>
                <th>Data Invio</th>
                <th>Azioni</th>
            </tr>
            <?php foreach ($pendingOrders as $pend) : $count++; ?>

                <tr>
                    <td class="big-screen"><?php echo $count; ?></td>
                    <td><?php echo esc_html($pend['order_id']); ?></td>
                    <td><?php echo esc_html($pend['created_date']); ?></td>
                    <td>
                        <a class="underline" href="<?php echo ROOT_URL . 'shop?page=view-order&id=' . esc_html($pend['order_id']); ?>">Vedi &raquo;</a>
                    </td>
                </tr>
            <?php endforeach;
            $count = 0; ?>
        </table>
    <?php else : ?>
        <p class="separate-top">Non hai alcun ordine in lavorazione.</p>
    <?php endif; ?>
</div>