<?php

namespace Kata\Algorithm\RPNAlgorithm;

class SubstractOperator implements Chunk
{
    const SYMBOL = '-';

    public function handle(OperandCollection $collection)
    {
        $last = $collection->pop();
        $prev = $collection->pop();

        $collection->push(new Operand($prev->getValue() - $last->getValue()));
    }
}
