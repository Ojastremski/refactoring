<?php

namespace ExampleOneBundle\Entity;

use ExampleOneBundle\Model\ItemInterface;
use ExampleOneBundle\Model\CartInterface;

/**
 * @ORM\Entity()
 */
class Cart implements CartInterface 
{
    /**
     * @ORM\Column(name="items", type="json_array")
     */
    protected $items = [];

    /**
     * @ORM\Column(name="total" type="integer")
    */
    protected $total = 0;

    public function addItem(ItemInterface $item): void
    {
        $this->items[] = $item;
        $this->total += $item->getPrice();
    }

    public function getItem()
    {
        return $this->items;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function getTotal(): int
    {
        return $this->total;
    }
}