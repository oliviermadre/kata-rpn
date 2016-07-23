<?php

namespace Kata\Algorithm;


use Kata\Parser\TokenCollection;

interface CalculationAlgorithm
{
    public function compute(TokenCollection $collection);
}
