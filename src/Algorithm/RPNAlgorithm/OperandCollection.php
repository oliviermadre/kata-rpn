<?php

namespace Kata\Algorithm\RPNAlgorithm;

class OperandCollection 
{
    private $operands;

    public function __construct()
    {
        $this->operands = [];
    }

    public function push(Operand $operand)
    {
        array_push($this->operands, $operand);
        return true;
    }

    /**
     * @return Operand
     */
    public function pop()
    {
        return array_pop($this->operands);
    }
}
