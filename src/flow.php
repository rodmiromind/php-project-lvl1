<?php

namespace BrainGames\Flow;

use function cli\line;
use function cli\prompt;
const NUMBERS_OF_ROUNDS = 3;

function flow($gameRule, $questionAndAnswer)
{
    line('Welcome to the Brain Games!');
    line("$gameRule");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < NUMBERS_OF_ROUNDS; $i++) {
        line("Question: {$questionAndAnswer[$i][0]}");
        $answer = prompt('Your answer');

        if ($answer == $questionAndAnswer[$i][1]) {
            line("Correct!");
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '{$questionAndAnswer[$i][1]}'.
            Let's try again, $name!");
            exit;
        }
    }

    line("Congratulations, $name!");
}
