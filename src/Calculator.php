<?php

namespace Kata;

use Kata\Algorithm\CalculationAlgorithm;
use Kata\Parser\TokenParser;

class Calculator
{
    /**
     * @var TokenParser
     */
    private $parser;

    /**
     * @param TokenParser $parser
     * @param CalculationAlgorithm $algorithm
     */
    public function __construct(TokenParser $parser, CalculationAlgorithm $algorithm)
    {
        $this->parser = $parser;
        $this->algorithm = $algorithm;
    }

    public function compute($string)
    {
        $tokenCollection = $this->parser->parse($string);
        return $this->algorithm->compute($tokenCollection);
    }
}
