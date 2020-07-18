<?php declare(strict_types=1);

namespace App\FizzBuzz;

class FizzBuzzMultipleOfThreeAndFive implements FizzBuzzInterface
{
    private FizzBuzzMultipleOfFive $fizzBuzz;

    public function __construct(FizzBuzzMultipleOfFive $fizzBuzz)
    {
        $this->fizzBuzz = $fizzBuzz;
    }

    public function find($number): string
    {
        if ($number % 5 === 0 && $number % 3 === 0) {
            return "FizzBuzz";
        }

        return $this->fizzBuzz->find($number);
    }
}
