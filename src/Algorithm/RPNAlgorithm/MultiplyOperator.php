<?php

namespace Kata\Algorithm\RPNAlgorithm;

class MultiplyOperator implements Chunk
{
    const SYMBOL = 'x';

    public function handle(OperandCollection $collection)
    {
        $last = $collection->pop();
        $prev = $collection->pop();

        $collection->push(new Operand($last->getValue() * $prev->getValue()));
    }
}
