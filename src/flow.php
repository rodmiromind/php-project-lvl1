<?php

namespace BrainGames\Flow;

use function cli\line;
use function cli\prompt;

function flow($gameRules, $questions, $correctAnswers)
{
    line('Welcome to the Brain Games!');
    line("{$gameRules}");
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < 3; $i++) {
        line("Question: {$questions[$i]}");
        $answer = \cli\prompt('Your answer');

        if ($answer == $correctAnswers[$i]) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswers[$i]}'.
            Let's try again, {$name}!");
            exit;
        }
    }

    line("Congratulations, {$name}!");
}
