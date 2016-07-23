<?php

namespace Kata\Algorithm\RPNAlgorithm;

use Kata\Parser\NumericToken;
use Kata\Parser\Token;
use Kata\Parser\TokenCollection;
use LogicException;

class TokenToChunkConverter
{
    private $convertableOperators;

    public function __construct()
    {
        $this->convertableOperators = [
            DivideOperator::SYMBOL => DivideOperator::class,
            MultiplyOperator::SYMBOL => MultiplyOperator::class,
            SumOperator::SYMBOL => SumOperator::class,
            SubstractOperator::SYMBOL => SubstractOperator::class,
            SquareOperator::SYMBOL => SquareOperator::class
        ];
    }

    public function convertAll(TokenCollection $tokens)
    {
        $collection = new ChunkCollection();

        foreach ($tokens as $token) {
            $collection->push($this->convert($token));
        }

        return $collection;
    }

    private function convert(Token $token)
    {
        if ($token instanceof NumericToken) {
            return new Operand($token->getValue());
        }

        return $this->convertTokenToOperator($token);
    }

    /**
     * @param Token $token
     * @return Chunk
     * @throw LogicException
     */
    private function convertTokenToOperator(Token $token)
    {
        if (array_key_exists($token->getValue(), $this->convertableOperators)) {
            return new $this->convertableOperators[$token->getValue()]();
        }

        throw new LogicException("Unknown type");
    }
}
