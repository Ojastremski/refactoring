<?php

namespace spec\ExampleOneBundle\Service;

use ExampleOneBundle\Model\CartInterface;
use ExampleOneBundle\Model\ItemInterface;
use ExampleOneBundle\Service\Cart;
use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\Collaborator;
use Prophecy\Argument;

/**
 * @author Artur Świerc <artur.swierc@enp.pl>
 */
class CartSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Cart::class);
        $this->shouldImplement(CartInterface::class);
    }

    /**
     * @param ItemInterface|Collaborator $item
     */
    public function it_can_add_items(ItemInterface $item)
    {
        $item->getPrice()->willReturn(100);
        $item->getPrice()->shouldBeCalled();
        $item->getName()->willReturn('TV LCD');

        $this->addItem($item);
    }

    /**
     * @param ItemInterface|Collaborator $item
     * @param ItemInterface|Collaborator $item2
     */
    public function it_can_get_correct_total_price(ItemInterface $item, ItemInterface $item2)
    {
        $item->getPrice()->willReturn(100);
        $item->getName()->willReturn('TV LCD');

        $item2->getPrice()->willReturn(200);
        $item2->getName()->willReturn('Samsung S1000');

        $this->addItem($item);
        $this->addItem($item2);

        $this->getTotal()->shouldReturn(300);
    }

    /**
     * @param ItemInterface|Collaborator $item
     */
    public function it_can_change_total_price(ItemInterface $item)
    {
        $item->getPrice()->willReturn(100);
        $item->getName()->willReturn('TV LCD');

        $this->addItem($item);
        $this->setTotal(200);

        $this->getTotal()->shouldReturn(200);
    }
}
