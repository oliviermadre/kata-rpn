<?php

namespace Kata\Algorithm\RPNAlgorithm;

class Operand implements Chunk
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function handle(OperandCollection $collection)
    {
        $collection->push($this);
    }

    public function getValue()
    {
        return $this->value;
    }
}
