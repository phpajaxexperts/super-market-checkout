<?php
include('Database.php');

class Checkout
{
    public function calcCheckout($cart_items){
        $mysqli = Database::connect();
        $cart_products = [];
        if(count($cart_items)>0){
            foreach ($cart_items as $cart_item){
                $product_total_price = 0;
                $product_sql = "SELECT ID, item, unit_price FROM products WHERE ID='".$cart_item['productID']."'";
                $product_result = $mysqli->query($product_sql);
                $product = mysqli_fetch_array($product_result, MYSQLI_ASSOC);

                $product_offer_sql = "SELECT ID, offer_qty, special_price, (" . $cart_item['qty'] . "/offer_qty) as max_qty_offer FROM product_offers WHERE product='".$cart_item['productID']."' AND  offer_qty<='".$cart_item['qty']."' AND  offer_qty!='0' AND  addon_product='0' ORDER BY max_qty_offer ASC ";
                $product_offer_result = $mysqli->query($product_offer_sql);
                $product_offer = mysqli_fetch_array($product_offer_result, MYSQLI_ASSOC);

                if(isset($product_offer['ID'])) {
                    if ($product_offer['offer_qty'] != 0) {
                        $offer_count = floor($cart_item['qty'] / $product_offer['offer_qty']);
                        $remaining_product_count = $cart_item['qty'] % $product_offer['offer_qty'];
                        $product_total_price = ($offer_count * $product_offer['special_price']) + ($remaining_product_count * $product['unit_price']);
                    }
                }else{
                    $product_offer_sql = "SELECT ID, special_price, addon_product FROM product_offers WHERE product='".$cart_item['productID']."' AND  addon_product!='0' ";
                    $product_offer_result = $mysqli->query($product_offer_sql);
                    $product_offer = mysqli_fetch_array($product_offer_result, MYSQLI_ASSOC);

                    if(isset($product_offer['addon_product']))
                        $cart_item_key = Checkout::searchForId($product_offer['addon_product'],$cart_items);

                    if(isset($product_offer['ID']) && isset($cart_item_key)) {
                        $product_total_price = $cart_item['qty'] * $product_offer['special_price'];
                    }else{
                        $product_total_price = $cart_item['qty'] * $product['unit_price'];
                    }
                }

                $cart_item_details [] = [
                    'productID' => $product['ID'],
                    'item' => $product['item'],
                    'qty' => $cart_item['qty'],
                    'product_total_price' => $product_total_price
                ];
            }
        }
        return $cart_item_details;
    }

    function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['productID'] == $id) {
                return $key;
            }
        }
        return null;
    }
}