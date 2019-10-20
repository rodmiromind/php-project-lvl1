<?php

namespace BrainGames\Flow;

use function cli\line;
use function cli\prompt;

function flow($gameRule, $questionAndAnswer)
{
    line('Welcome to the Brain Games!');
    line("{$gameRule}");
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < 3; $i++) {
        line("Question: {$questionAndAnswer[$i][0]}");
        $answer = \cli\prompt('Your answer');

        if ($answer == $questionAndAnswer[$i][1]) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$questionAndAnswer[$i][1]}'.
            Let's try again, {$name}!");
            exit;
        }
    }

    line("Congratulations, {$name}!");
}
