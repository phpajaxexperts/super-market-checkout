<?php
use PHPUnit\Framework\TestCase;
include 'Checkout.php';

final class CheckoutTest extends TestCase
{
    public function testCheckoutProductA()
    {
        $cart_items[] = ['productID' => 1, 'qty' => 5];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertEquals(
            230,$checkout_items[0]['product_total_price']
        );
    }

    public function testNegativeCheckoutProductA()
    {
        $cart_items[] = ['productID' => 1, 'qty' => 5];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertNotEquals(
            100,$checkout_items[0]['product_total_price']
        );
    }

    public function testCheckoutProductDwithAddonProductA()
    {
        $cart_items[] = ['productID' => 1, 'qty' => 5];
        $cart_items[] = ['productID' => 4, 'qty' => 5];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertEquals(
            25,$checkout_items[1]['product_total_price']
        );
    }

    public function testNegativeCheckoutProductDwithAddonProductA()
    {
        $cart_items[] = ['productID' => 1, 'qty' => 5];
        $cart_items[] = ['productID' => 4, 'qty' => 5];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertNotEquals(
            100,$checkout_items[1]['product_total_price']
        );
    }

    public function testCheckoutProductDwithoutAddonProductA()
    {
        $cart_items[] = ['productID' => 4, 'qty' => 5];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertEquals(
            75,$checkout_items[0]['product_total_price']
        );
    }

    public function testNegativeCheckoutProductDwithoutAddonProductA()
    {
        $cart_items[] = ['productID' => 4, 'qty' => 5];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertNotEquals(
            100,$checkout_items[0]['product_total_price']
        );
    }

    public function testCheckoutProductE()
    {
        $cart_items[] = ['productID' => 5, 'qty' => 5];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertEquals(
            25,$checkout_items[0]['product_total_price']
        );
    }

    public function testNegativeCheckoutProductE()
    {
        $cart_items[] = ['productID' => 5, 'qty' => 5];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertNotEquals(
            100,$checkout_items[0]['product_total_price']
        );
    }

    public function testCheckoutZeroQty()
    {
        $cart_items[] = ['productID' => 5, 'qty' => 0];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertEquals(
            0,$checkout_items[0]['product_total_price']
        );
    }

    public function testNegativeCheckoutZeroQty()
    {
        $cart_items[] = ['productID' => 5, 'qty' => 0];
        $checkout_items = Checkout::calcCheckout($cart_items);
        $this->assertNotEquals(
            100,$checkout_items[0]['product_total_price']
        );
    }
}
?>