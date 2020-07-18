<?php

namespace App\Command;

use App\FizzBuzz\FizzBuzz;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class FizzbuzzCommand extends Command
{
    private FizzBuzz $fizzBuzz;

    public function __construct(FizzBuzz $fizzBuzz)
    {
        parent::__construct('app:fizzbuzz');
        $this->fizzBuzz = $fizzBuzz;
    }

    protected function configure()
    {
        $this
            ->setDescription('Outputs the FizzBuzz problem')
            ->addArgument('iterations', InputArgument::OPTIONAL, 'Amount of iterations of fizzbuz have to be shown', 100)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $iterations = $input->getArgument('iterations');

        foreach(range(1, $iterations) as $iteration) {
            $io->write($this->fizzBuzz->find($iteration));
        }

        return 0;
    }
}
