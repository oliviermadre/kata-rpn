<?php

namespace Kata;

class Calculator
{
    public function compute($string)
    {
        $tokens = explode(' ', $string);

        $storedValues = array();

        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                array_push($storedValues, (int)$token);
                continue;
            }

            array_push($storedValues, $this->handle($token, $storedValues));
        }

        return $storedValues[0];
    }

    private function handle($token, &$storedValues)
    {
        $newValue = null;

        switch($token) {
            case '+':
                $val2 = array_pop($storedValues);
                $val1 = array_pop($storedValues);
                $newValue = $val1 + $val2;
                break;
            case '-':
                $val2 = array_pop($storedValues);
                $val1 = array_pop($storedValues);
                $newValue = $val1 - $val2;
                break;
            case '/':
                $val2 = array_pop($storedValues);
                $val1 = array_pop($storedValues);
                $newValue = $val1 / $val2;
                break;
            case 'x':
                $val2 = array_pop($storedValues);
                $val1 = array_pop($storedValues);
                $newValue = $val1 * $val2;
                break;
            case 'SQR':
                $val = array_pop($storedValues);
                $newValue = $val * $val;
        }
        
        return $newValue;
    }
}
