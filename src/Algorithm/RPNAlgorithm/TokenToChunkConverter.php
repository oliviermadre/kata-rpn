<?php

namespace Kata\Algorithm\RPNAlgorithm;

use Kata\Parser\NumericToken;
use Kata\Parser\Token;
use Kata\Parser\TokenCollection;
use LogicException;

class TokenToChunkConverter
{
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
     * @return DivideOperator|MultiplyOperator|SquareOperator|SubstractOperator|SumOperator
     */
    private function convertTokenToOperator(Token $token)
    {
        switch ($token->getValue()) {
            case DivideOperator::SYMBOL:
                return new DivideOperator();
            case MultiplyOperator::SYMBOL:
                return new MultiplyOperator();
            case SumOperator::SYMBOL:
                return new SumOperator();
            case SubstractOperator::SYMBOL:
                return new SubstractOperator();
            case SquareOperator::SYMBOL:
                return new SquareOperator();
            default:
                throw new LogicException("Unknown type");
        }
    }
}
