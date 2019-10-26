<?php

namespace BrainGames\games\gcd;

use function BrainGames\flow\flow;

use const BrainGames\flow\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function getGcd($num1, $num2)
{
    $min = min([$num1, $num2]);
    $gcd = 1;
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
    $num1 = random_int(MIN_NUMBER, MAX_NUMBER);
    $num2 = random_int(MIN_NUMBER, MAX_NUMBER);
    $question = "$num1 $num2";
    $answer = getGcd($num1, $num2);
    return [$question, $answer];
}

function run()
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }

    flow(GAME_DESCRIPTION, $questionAndAnswer);
}
