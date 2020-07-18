<?php

namespace App\Tests\FizzBuzz;

use App\FizzBuzz\FizzBuzzMultipleOfFive;
use App\FizzBuzz\FizzBuzzWithoutMultiples;
use PHPUnit\Framework\TestCase;

class FizzBuzzWithoutMultiplesTest extends TestCase
{
    /**
     * @dataProvider fizzBuzzNoMultiples
     * @param $expected
     * @param $number
     */
    public function testItFindsEverything($expected, $number)
    {

        $fizzBuzz = new FizzBuzzWithoutMultiples();

        $this->assertSame($expected, $fizzBuzz->find($number));
    }

    public function fizzBuzzNoMultiples()
    {
        return [
            ["1", 1],
            ["10", 10],
            ["11", 11],
            ["2", 2],
            ["99", 99],
        ];
    }
}
