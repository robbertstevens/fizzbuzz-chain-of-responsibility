<?php

namespace App\Tests\FizzBuzz;

use App\FizzBuzz\FizzBuzzMultipleOfFive;
use App\FizzBuzz\FizzBuzzMultipleOfThree;
use App\FizzBuzz\FizzBuzzWithoutMultiples;
use PHPUnit\Framework\TestCase;

class FizzBuzzMultipleOfFiveTest extends TestCase
{
    /**
     * @dataProvider fizzBuzzMultipleOfFive
     * @param string $expected
     * @param int $number
     */
    public function testItFindsFizzWhenMultipleOfFive($expected, $number)
    {
        $fizzBuzzMock = $this->createMock(FizzBuzzMultipleOfThree::class);
        $fizzBuzzMock->method("find")->willReturn($number);
        $fizzBuzz = new FizzBuzzMultipleOfFive($fizzBuzzMock);

        $this->assertSame($expected, $fizzBuzz->find($number));
    }

    /**
     * @dataProvider fizzBuzzNotMultipleOfFive
     * @param $expected
     * @param $number
     */
    public function testItFindsNothingWhenNumberIsNotMultipleOfThree($expected, $number)
    {
        $fizzBuzzMock = $this->createMock(FizzBuzzWithoutMultiples::class);
        $fizzBuzzMock->method("find")->willReturn((string) $number);
        $fizzBuzz = new FizzBuzzMultipleOfThree($fizzBuzzMock);

        $this->assertSame($expected, $fizzBuzz->find($number));
    }

    public function fizzBuzzMultipleOfFive()
    {
        return [
            ["Buzz", 5],
            ["Buzz", 10],
            ["Buzz", 15],
            ["Buzz", 20],
            ["Buzz", 205],
            ["Buzz", 1005],
        ];
    }

    public function fizzBuzzNotMultipleOfFive()
    {
        return [
            ["1", 1],
            ["11", 11],
            ["14", 14],
            ["100", 100],
            ["29", 29],
            ["31", 31],
        ];
    }
}
