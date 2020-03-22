<?php

namespace ExampleOneBundle\Service;

use ExampleOneBundle\Entity\Item;
use ExampleOneBundle\Entity\Operator;
use ExampleOneBundle\Entity\Cart;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class BasketCalculations
{
    private $operator;
    private $percentModifier;

    public function __construct(Operator $operator, float $percentModifier)
    {
        $this->operator = $operator;
        $this->percentModifier = $percentModifier;
    }

    //cart initialization
    public function initCartItems($request)
    {
        foreach ($request as $product) {
            $item = new Item();
            $item->setProductName($product['name']);
            $item->setPrice($product['price']);

            $this->operator->getCart()->addItem($item);
        }
    }

    //calculation of products in the cart
    public function basketPrice()
    {
        $newTotal = $oldTotal = $this->operator->getCart()->getTotal();
    
        if ($this->percentModifier > 0) {
            $modifier = ($this->percentModifier / 100);
            $newTotal = $oldTotal + ($oldTotal * $modifier);
        }

        return array('newTotal' => $newTotal, 'oldTotal' => $oldTotal);
    }
}
