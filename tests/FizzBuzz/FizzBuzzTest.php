<?php

namespace App\Tests\FizzBuzz;

use App\FizzBuzz\FizzBuzz;
use App\FizzBuzz\FizzBuzzMultipleOfFive;
use App\FizzBuzz\FizzBuzzMultipleOfThree;
use App\FizzBuzz\FizzBuzzMultipleOfThreeAndFive;
use App\FizzBuzz\FizzBuzzWithoutMultiples;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @dataProvider fizzBuzz
     * @param string $expected
     * @param int $number
     */
    public function testItWillReturnExpectedValue($expected, $number)
    {
        $noMultiples = new FizzBuzzWithoutMultiples();
        $multiplesOfThree = new FizzBuzzMultipleOfThree($noMultiples);
        $multiplesOfFive = new FizzBuzzMultipleOfFive($multiplesOfThree);
        $multiplesOfThreeAndFive = new FizzBuzzMultipleOfThreeAndFive($multiplesOfFive);
        $fizzBuzz = new FizzBuzz($multiplesOfThreeAndFive);

        $this->assertSame($expected, $fizzBuzz->find($number));
    }

    public function fizzBuzz()
    {
        yield ["1", 1];
        yield ["3Fizz", 3];
        yield ["Buzz", 5];
        yield ["Buzz", 10];
        yield ["FizzBuzz", 15];
        yield ["16", 16];
    }
}
