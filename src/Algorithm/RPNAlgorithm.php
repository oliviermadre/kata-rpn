<?php

namespace Kata\Algorithm;

use Kata\Algorithm\RPNAlgorithm\Chunk;
use Kata\Algorithm\RPNAlgorithm\ChunkCollection;
use Kata\Algorithm\RPNAlgorithm\OperandCollection;
use Kata\Algorithm\RPNAlgorithm\TokenToChunkConverter;
use Kata\Parser\TokenCollection;

class RPNAlgorithm implements CalculationAlgorithm
{
    private $converter;

    public function __construct()
    {
        $this->converter = new TokenToChunkConverter();
    }

    public function compute(TokenCollection $tokenCollection)
    {
        $chunkCollection = $this->converter->convertAll($tokenCollection);

        $operandCollection = new OperandCollection();

        foreach ($chunkCollection as $chunk) {
            /** @var Chunk $chunk */
            $chunk->handle($operandCollection);
        }

        $operand = $operandCollection->pop();
        return $operand->getValue();
    }
}
