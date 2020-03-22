<?php

namespace ExampleOneBundle\Entity;

use ExampleOneBundle\Model\ItemInterface;

class Item implements ItemInterface {
    function ustawCene($cena){
        $this->cena = $cena;
    }
    function ustawNazwe($nazwa){
        $this->nazwa = $nazwa;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->cena;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->nazwa;
    }

    public $cena;
    public $nazwa;
}