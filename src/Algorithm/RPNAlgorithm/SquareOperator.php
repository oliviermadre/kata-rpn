<?php

namespace Kata\Algorithm\RPNAlgorithm;

class SquareOperator implements Chunk
{
    const SYMBOL = 'SQR';

    public function handle(OperandCollection $collection)
    {
        $last = $collection->pop();

        $collection->push(new Operand($last->getValue() * $last->getValue()));
    }
}
