<?php

namespace BrainGames\flow;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function flow($gameRule, $questionAndAnswer)
{

    line('Welcome to the Brain Games!');
    line("$gameRule");
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    foreach ($questionAndAnswer as [$question, $answer]) {
        line("Question: $question");
        $userAnswer = prompt('Your answer');

        if ($userAnswer == $answer) {
            line("Correct!");
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$answer'.");
            line("Let's try again, $name!");
            exit;
        }
    }

    line("Congratulations, $name!");
}
