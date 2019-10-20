<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Flow\flow;

const GAMERULE = 'Find the greatest common divisor of given numbers.';

function run()
{
    function getQuestion()
    {
        return [random_int(1, 100), random_int(1, 100)];
    }

    function getCorrectAnswer($numbers)
    {
        $min = min($numbers);
        $gcd = 1;
        [$num1, $num2] = $numbers;
        if ($num1 % $min === 0 && $num2 % $min === 0) {
            return $min;
        }
        for ($i = 2, $max = floor($min / 2); $i <= $max; $i++) {
            if ($num1 % $i === 0 && $num2 % $i === 0 && $i > $gcd) {
                $gcd = $i;
            }
        }
        return $gcd;
    }

    function getQuestionAndAnswer()
    {
        $question = getQuestion();
        $answer = getCorrectAnswer($question);
        return [implode(' ', $question), $answer];
    }

    for ($i = 0; $i < 3; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }

    flow(GAMERULE, $questionAndAnswer);
}
