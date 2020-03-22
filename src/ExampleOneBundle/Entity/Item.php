<?php

namespace ExampleOneBundle\Entity;

use ExampleOneBundle\Model\ItemInterface;

/**
 * @ORM\Entity()
 */
class Item implements ItemInterface 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    
    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $price;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank()
     * @Assert\Length(min="3")
    */
    private $productName;

    public function setId($id)
    {
        $this->id = $id;
    } 

    public function getId(): int
    {
        $this->id = $id;
    } 
    
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }
}