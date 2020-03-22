<?php

namespace ExampleOneBundle\Controller;

use ExampleOneBundle\Entity\Item;
use ExampleOneBundle\Entity\Operator;
use ExampleOneBundle\Service\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OperatorController extends Controller
{
    protected $cart = 'no-init';
    protected $operator;

    public function indexAction()
    {
        $this->initCartItems();

        $this->setupCustomer();
        $operatorPriceModifier = $this->getOperatoroPriceMOdifier();

        $oldTotal = $this->getCart()->getTotal();
        $newTotal = $this->getCart()->getTotal();

        if ($operatorPriceModifier > 0) {
            $cart = $this->getCart();

            $oldTotal = $cart->getTotal();

            $modifier = ($operatorPriceModifier / 100);

            $newTotal = $oldTotal * $modifier;
        }

        return $this->render('ExampleOneBundle:Operator:index.html.twig', array(
            'oldTotal' => $oldTotal,
            'newTotal' => $newTotal,
        ));
    }

    function getOperatoroPriceMOdifier()
    {
        if ($this->operator) {
            return $this->container->getParameter('example_one.operator_price_modifier');
        }
    }

    public function setupCustomer(){
        if (isset($_SESSION['customer']) && $_SESSION['customer'] instanceof Operator) {
            $this->operator = $_SESSION['customer'];
        }
    }

    /**
     * ok, this method is necessary only for this example - we have to somehow add items to cart :)
     * but you can still refactorize it
     */
    protected function initCartItems()
    {
        $item = new Item();
        $item->ustawNazwe("TV LCD");
        $item->ustawCene(100);

        $item2 = new Item();
        $item2->ustawNazwe("Samsung S1000");
        $item2->ustawCene(200);

        $cart = $this->getCart();
        $cart->addItem($item);
        $cart->addItem($item2);
    }

    public function getCart()
    {
        if ($this->cart == 'no-init') {
            $this->cart = new Cart();
            return $this->cart;
        }
        else {

            return $this->cart;
        }

    }
}
