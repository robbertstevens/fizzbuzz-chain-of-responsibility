<?php

namespace App\Tests\FizzBuzz;

use App\FizzBuzz\FizzBuzzMultipleOfThree;
use App\FizzBuzz\FizzBuzzWithoutMultiples;
use PHPUnit\Framework\TestCase;

class FizzBuzzMultipleOfThreeTest extends TestCase
{
    /**
     * @dataProvider fizzBuzzMultipleOfThree
     * @param string $expected
     * @param int $number
     */
    public function testItFindsFizzWhenMultipleOfThree($expected, $number)
    {
        $fizzBuzzMock = $this->createMock(FizzBuzzWithoutMultiples::class);
        $fizzBuzzMock->method("find")->willReturn($number);
        $fizzBuzz = new FizzBuzzMultipleOfThree($fizzBuzzMock);

        $this->assertSame($expected, $fizzBuzz->find($number));
    }

    /**
     * @dataProvider fizzBuzzNotMultipleOfThree
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

    public function fizzBuzzMultipleOfThree()
    {
        return [
            ["3Fizz", 3],
            ["6Fizz", 6],
            ["9Fizz", 9],
            ["15Fizz", 15],
            ["30Fizz", 30],
            ["60Fizz", 60],
        ];
    }

    public function fizzBuzzNotMultipleOfThree()
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
