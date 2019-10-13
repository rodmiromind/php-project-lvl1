<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function BrainGames\BrainEvenFunc\findCorrectAnswer;
use function BrainGames\BrainEvenFunc\getNumber;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i != 3; $i++) {
        $number = getNumber();
        line("Question: {$number}");
        $answer = \cli\prompt('Your answer');
        $correctAnswer = findCorrectAnswer($number);

        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
            Let's try again,{$name}!");
            exit;
        }
    }

    line("Congratulations, {$name}!");
}
