<?php
require('Checkout.php');
$cart_items[] = ['productID' => 1, 'qty' => 5];
$cart_items[] = ['productID' => 2, 'qty' => 3];
$cart_items[] = ['productID' => 3, 'qty' => 4];
$cart_items[] = ['productID' => 4, 'qty' => 5];
$cart_items[] = ['productID' => 5, 'qty' => 6];

$cart_item_details = Checkout::calcCheckout($cart_items);
?>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <table class="table table-striped custab">
            <thead>
            <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b>Checkout</a>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Item Total</th>
            </tr>
            </thead>
            <?php
            $total_amount = 0;
            ?>

            <?php
            if(count($cart_item_details)>0){
                foreach($cart_item_details as $product){
                    $total_amount += $product['product_total_price']; ?>
                    <tr>
                        <td><?=$product['item'];?></td>
                        <td><?=$product['qty'];?></td>
                        <td><?=$product['product_total_price'];?></td>
                    </tr>
            <?php
                }
            } ?>
            <tr>
                <th></th>
                <th>Total</th>
                <th><?=$total_amount;?></th>
            </tr>
        </table>
    </div>
</div>
