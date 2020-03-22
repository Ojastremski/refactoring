<?php

namespace ExampleOneBundle\Model;

interface ItemInterface
{
    public function getId(): int;
    
    public function getPrice(): float;

    public function getProductName(): string;
}
