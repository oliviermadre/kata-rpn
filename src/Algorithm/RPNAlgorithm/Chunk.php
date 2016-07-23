<?php

namespace Kata\Algorithm\RPNAlgorithm;

interface Chunk
{
    public function handle(OperandCollection $collection);
}
