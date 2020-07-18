<?php declare(strict_types=1);

namespace App\FizzBuzz;

class FizzBuzzMultipleOfThree implements FizzBuzzInterface
{
    private FizzBuzzWithoutMultiples $fizzBuzz;

    public function __construct(FizzBuzzWithoutMultiples $fizzBuzz)
    {
        $this->fizzBuzz = $fizzBuzz;
    }

    public function find($number): string
    {
        if ($number % 3 === 0) {
            return "{$number}Fizz";
        }

        return $this->fizzBuzz->find($number);
    }
}
