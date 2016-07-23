<?php

namespace Kata\Parser;


class TokenParser
{
    /**
     * @var TokenFactory
     */
    private $factory;
    /**
     * @var string
     */
    private $separator;

    /**
     * @param TokenFactory $factory
     * @param string $separator
     */
    public function __construct(TokenFactory $factory, $separator = ' ')
    {
        $this->factory = $factory;
        $this->separator = $separator;
    }

    /**
     * @param $string
     */
    public function parse($string)
    {
        $chunks = explode($this->separator, $string);

        $collection = new TokenCollection();

        foreach ($chunks as $chunk) {
            $token = $this->factory->get($chunk);
            $collection->push($token);
        }

        return $collection;
    }
}