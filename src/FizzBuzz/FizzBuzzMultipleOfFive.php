<?php declare(strict_types=1);

namespace App\FizzBuzz;

class FizzBuzzMultipleOfFive implements FizzBuzzInterface
{
    private FizzBuzzMultipleOfThree $fizzBuzz;

    public function __construct(FizzBuzzMultipleOfThree $fizzBuzz)
    {
        $this->fizzBuzz = $fizzBuzz;
    }

    public function find($number): string
    {
        if ($number % 5 === 0) {
            return "Buzz";
        }

        return $this->fizzBuzz->find($number);
    }
}
