<?php

namespace Kata\Parser;

class NumericToken implements Token
{
    /**
     * @var
     */
    private $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $this->sanitizeValue($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    private function sanitizeValue($value)
    {
        if (intval($value) == $value) {
            return (int) $value;
        }

        return (float) $value;
    }
}
