<?php

namespace Kata\Algorithm\RPNAlgorithm;

class SumOperator implements Chunk
{
    const SYMBOL = '+';

    public function handle(OperandCollection $collection)
    {
        $last = $collection->pop();
        $prev = $collection->pop();

        $collection->push(new Operand($last->getValue() + $prev->getValue()));
    }
}
