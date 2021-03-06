<?php

namespace Kata\Test;

use Kata\Algorithm\RPNAlgorithm;
use Kata\Calculator;
use Kata\Parser\TokenFactory;
use Kata\Parser\TokenParser;
use LogicException;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator
     */
    private $SUT;

    public function setUp()
    {
        $this->SUT = new Calculator(
            new TokenParser(
                new TokenFactory(),
                ' '
            ),
            new RPNAlgorithm()
        );
    }

    /**
     * @test
     */
    public function it_should_sum_values()
    {
        $result = $this->SUT->compute('1 2 +');

        $this->assertEquals(3, $result);
    }

    /**
     * @test
     */
    public function it_should_diff_values()
    {
        $result = $this->SUT->compute('1 2 -');
        
        $this->assertEquals(-1, $result);
    }
    
    /**
     * @test
     */
    public function it_should_divide_values()
    {
        $result = $this->SUT->compute('12 3 /');
        
        $this->assertEquals(4, $result);
    }
    
    /**
     * @test
     */
    public function it_should_multiply_values()
    {
        $result = $this->SUT->compute('3 4 x');
        
        $this->assertEquals(12, $result);
    }
    
    /**
     * @test
     */
    public function it_should_return_10_on_complex_computation()
    {
        $result = $this->SUT->compute('5 2 - 7 +');

        $this->assertEquals(10, $result);
    }
    
    /**
     * @test
     */
    public function it_should_return_141_on_complex_computation()
    {
        $result = $this->SUT->compute('3 5 8 x 7 + x');

        $this->assertEquals(141, $result);
    }
    
    /**
     * @test
     */
    public function it_should_return_7_5_on_complex_computation()
    {
        $result = $this->SUT->compute('3 4 2 1 + x + 2 /');
        
        $this->assertEquals(7.5, $result);
    }
    
    /**
     * @test
     */
    public function it_should_return_14_on_complex_computation()
    {
        $result = $this->SUT->compute('1 2 + 4 x 5 + 3 -');
        
        $this->assertEquals(14, $result);
    }


    /**
     * @test
     */
    public function it_should_square_correctly()
    {
        $result = $this->SUT->compute('3 2 + SQR');

        $this->assertEquals(25, $result);
    }

    /**
     * @test
     */
    public function it_should_throw_an_exception_with_unknown_operator()
    {
        $this->setExpectedException(LogicException::class);

        $this->SUT->compute('3 2 wtf');
    }

    /**
     * @test
     */
    public function it_should_work_with_float_numbers_too()
    {
        $result = $this->SUT->compute('1.5 2.3 4 + +');

        $this->assertEquals(7.8, $result);
    }
}
