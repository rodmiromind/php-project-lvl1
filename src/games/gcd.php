<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Flow\flow;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const NUMBERS_OF_ROUNDS = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function getGcd($num1, $num2)
{
    $min = min([$num1, $num2]);
    $gcd = MIN_NUMBER;
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
    $question = [random_int(MIN_NUMBER, MAX_NUMBER), random_int(MIN_NUMBER, MAX_NUMBER)];
    $answer = getGcd($question[0], $question[1]);
    return [implode(' ', $question), $answer];
}

function run()
{
    for ($i = 0; $i < NUMBERS_OF_ROUNDS; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }

    flow(GAME_DESCRIPTION, $questionAndAnswer);
}
