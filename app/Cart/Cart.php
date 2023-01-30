<?php 

namespace App\Cart;

class Cart
{
    public $products = null;
    public $totalPrice = 0;
    public $totalAmount = 0;

    public function __construct($cart)
    {
        if($cart)
        {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalAmount = $cart->totalAmount;
        }
    }

    public function addCart($product, $id)
    {
        $newProduct = ['amount' => 0, 'price' =>$product->price_sale, 'productInfo' => $product];
        if($this->products)
        {
            if(array_key_exists($id, $this->products))
            {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['amount']++;
        $newProduct['price'] = $newProduct['amount'] * $product->price_sale;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price_sale;
        $this->totalAmount ++;
    }

    public function deleteItemCart($id)
    {
        $this->totalAmount -= $this->products[$id]['amount'];
        $this->totalPrice -= $this->products[$id]['price'];

        unset($this->products[$id]);
    }

    public function reducedAmount($product, $id)
    {
        $newProduct = ['amount' => 0, 'price' =>$product->price_sale, 'productInfo' => $product];
        if($this->products)
        {
            if(array_key_exists($id, $this->products))
            {
                $newProduct = $this->products[$id];
            }
        }

        if($newProduct['amount'] > 1)
        {
            $newProduct['amount']--;
            $newProduct['price'] = $newProduct['amount'] * $product->price;
            $this->products[$id] = $newProduct;
            $this->totalPrice -= $product->price_sale;
            $this->totalAmount --;
        }
        else
        {
            $this->deleteItemCart($id);
        }
    }
}

?>