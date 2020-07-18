<?php declare(strict_types=1);

namespace App\FizzBuzz;

class FizzBuzzWithoutMultiples implements FizzBuzzInterface
{
    public function find($number): string
    {
        return (string) $number;
    }
}
