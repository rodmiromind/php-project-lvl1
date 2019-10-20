<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Flow\flow;

const GAMERULE = 'Find the greatest common divisor of given numbers.';

function run()
{
    function getNumbers()
    {
        return [random_int(1, 100), random_int(1, 100)];
    }

    function getCorrectAnswer($numbersArray)
    {
        $min = min($numbersArray);
        $gcd = 1;
        [$a, $b] = $numbersArray;
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

    function getQuestionAndAnswer()
    {
        $question = getNumbers();
        $answer = getCorrectAnswer($question);
        return [implode(' ', $question), $answer];
    }

    for ($i = 0; $i < 3; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }

    flow(GAMERULE, $questionAndAnswer);
}
