<?php

namespace BrainGames\flow;

use function cli\line;
use function cli\prompt;

const NUMBERS_OF_ROUNDS = 3;

function flow($gameRule, $questionAndAnswer)
{
    foreach ($questionAndAnswer as [$question, $answer]) {
        $questions[] = $question;
        $answers[] = $answer;
    }
    line('Welcome to the Brain Games!');
    line("$gameRule");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < NUMBERS_OF_ROUNDS; $i++) {
        line("Question: {$questions[$i]}");
        $answer = prompt('Your answer');

        if ($answer == $answers[$i]) {
            line("Correct!");
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '{$answers[$i]}'.
            Let's try again, $name!");
            exit;
        }
    }

    line("Congratulations, $name!");
}
