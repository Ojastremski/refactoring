<?php

namespace ExampleOneBundle\Entity;

/**
 * @ORM\Entity()
 */
class Operator
{
    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank()
     * @Assert\Length(min="3")
    */
    private $name = 'Pani Bożenka z obsługi klienta';

    private $cart;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    //create cart
    public function getCart()
    {
        if (!isset($this->cart)) {
            $this->cart = new Cart();
        }

        return $this->cart;
    }
}
