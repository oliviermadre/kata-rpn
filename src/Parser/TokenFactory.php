<?php

namespace Kata\Parser;

class TokenFactory
{
    /**
     * @param $string
     * @return Token
     */
    public function get($string)
    {
        if (is_numeric($string)) {
            return new NumericToken($string);
        }

        return new OperatorToken($string);
    }
}
