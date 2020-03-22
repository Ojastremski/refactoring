<?php

namespace ExampleOneBundle\Model;

/**
 * @author Artur Świerc <artur.swierc@enp.pl>
 */
interface ItemInterface
{
    /**
     * @return int
     */
    public function getPrice(): int;

    /**
     * @return string
     */
    public function getName(): string;
}
