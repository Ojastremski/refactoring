<?php

namespace ExampleOneBundle\Controller;

use ExampleOneBundle\Service\BasketCalculations;
use ExampleOneBundle\Service\OperatorService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OperatorController extends Controller
{  
    public function demoRequestData()
    {
        return [
            [
                'name' => 'TV LCD',
                'price' => 100
            ],
            [
                'name' => 'Samsung S1000',
                'price' => 200
            ]
        ];
    }
        
    public function indexAction(Request $request)
    {
        //create operator | login simulation
        (new OperatorService())->setupOperator($request->getSession());

        $basketCalculation = new BasketCalculations(
            $request->getSession()->get('operator'),
            $this->container->getParameter('example_one.operator_price_modifier')
        );

        //cart initialization 
        $basketCalculation->initCartItems($this->demoRequestData());

        return $this->render('ExampleOneBundle:Operator:index.html.twig', $basketCalculation->basketPrice());
    }
}
