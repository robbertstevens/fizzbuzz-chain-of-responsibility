<?php declare(strict_types=1);

namespace App\FizzBuzz;

class FizzBuzz implements FizzBuzzInterface
{
    private FizzBuzzMultipleOfThreeAndFive $fizzBuzz;

    public function __construct(FizzBuzzMultipleOfThreeAndFive $fizzBuzz)
    {
        $this->fizzBuzz = $fizzBuzz;
    }

    public function find($number): string
    {
        return $this->fizzBuzz->find($number);
    }
}
