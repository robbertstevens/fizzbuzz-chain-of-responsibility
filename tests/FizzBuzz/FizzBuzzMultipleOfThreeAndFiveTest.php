<?php

namespace App\Tests\FizzBuzz;

use App\FizzBuzz\FizzBuzzMultipleOfFive;
use App\FizzBuzz\FizzBuzzMultipleOfThree;
use App\FizzBuzz\FizzBuzzMultipleOfThreeAndFive;
use App\FizzBuzz\FizzBuzzWithoutMultiples;
use PHPUnit\Framework\TestCase;

class FizzBuzzMultipleOfThreeAndFiveTest extends TestCase
{
    /**
     * @dataProvider fizzBuzzMultipleOfThree
     * @param string $expected
     * @param int $number
     */
    public function testItFindsFizzWhenMultipleOfThreeAndFive($expected, $number)
    {
        $fizzBuzzMock = $this->createMock(FizzBuzzMultipleOfFive::class);
        $fizzBuzzMock->method("find")->willReturn($number);
        $fizzBuzz = new FizzBuzzMultipleOfThreeAndFive($fizzBuzzMock);

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
            ["FizzBuzz", 15],
            ["FizzBuzz", 30],
            ["FizzBuzz", 45],
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
