<?php

namespace ExampleOneBundle\Service;

use ExampleOneBundle\Model\CartInterface;
use ExampleOneBundle\Model\ItemInterface;

/**
 * @author Artur Świerc <artur.swierc@enp.pl>
 */
class Cart implements CartInterface
{
    /**
     * @var ItemInterface[]
     */
    protected $items = [];

    /**
     * @var int
     */
    protected $total = 0;

    /**
     * @param ItemInterface $item
     */
    public function addItem(ItemInterface $item): void
    {
        $this->items[] = $item;
        $this->total += $item->getPrice();
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total): void
    {
        $this->total = $total;
    }
}
