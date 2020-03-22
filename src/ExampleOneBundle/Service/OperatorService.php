<?php

namespace ExampleOneBundle\Service;

use ExampleOneBundle\Entity\Operator;

class OperatorService
{
    public function setupOperator($session)
    {
        //if the operator does not exist, create it
        if (!$session->has('operator')) {
           $session->set('operator',  new Operator());
        } 
    }
}   