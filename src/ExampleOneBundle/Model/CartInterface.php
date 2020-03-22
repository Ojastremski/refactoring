<?php

namespace ExampleOneBundle\Model;

/**
 * @author Artur Świerc <artur.swierc@enp.pl>
 */
interface CartInterface
{
    /**
     * @param ItemInterface $item
     */
    public function addItem(ItemInterface $item): void;

    /**
     * @return int
     */
    public function getTotal(): int;

    /**
     * @param int $total
     */
    public function setTotal(int $total): void;
}
