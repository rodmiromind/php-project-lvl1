<?php

namespace BrainGames\BrainGcd;

use function cli\line;
use function BrainGames\Flow\flow;

function run()
{
    function getQuestion()
    {
        return [random_int(1, 100), random_int(1, 100)];
    }

    function findCorrectAnswer($question)
    {
        $min = min($question);
        $gcd = 1;
        [$a, $b] = $question;
        if ($a % $min === 0 && $b % $min === 0) {
            return $min;
        }
        for ($i = 2, $max = floor($min / 2); $i <= $max; $i++) {
            if ($a % $i === 0 && $b % $i === 0 && $i > $gcd) {
                $gcd = $i;
            }
        }
        return $gcd;
    }

    for ($i = 0; $i < 3; $i++) {
        $question = getQuestion();
        $questions[] = implode(' ', $question);
        $correctAnswers[] = findCorrectAnswer($question);
    }

    $gameRules = 'Find the greatest common divisor of given numbers.';
    flow($gameRules, $questions, $correctAnswers);
}
