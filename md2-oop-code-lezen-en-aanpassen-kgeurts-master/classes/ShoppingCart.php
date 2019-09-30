<?php

class ShoppingCart
{

    private $products;


    public function __construct()
    {
        $this->products = [];
    }

    /**
     * Add a product
     * @param $product
     */
    public function addProduct($product)
    {
        $this->products[] = $product;
    }

    /**
     * Remove an item from the shopping cart at a position
     * @param $index
     */
    public function removeItem($position)
    {
        array_splice($this->products, $position, 1);
    }

    /**
     * Returns all products in the shopping cart.
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function hasProducts()
    {
        return !empty($this->products);
    }


    public function getTotal()
    {
        $total = 0;
        foreach ($this->products as $product):
            $total += $product->getPrice();
        endforeach;
        return $total;
    }
    public function clearCart()
    {
        session_start();
        session_destroy();
        header('Location: cart.php');

    }


}