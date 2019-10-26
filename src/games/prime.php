<?php

namespace BrainGames\games\prime;

use function BrainGames\flow\flow;

use const BrainGames\flow\ROUNDS_COUNT;

const GAME_DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= floor($num / 2); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function getQuestionAndAnswer()
{
    $question = random_int(MIN_NUMBER, MAX_NUMBER);
    $answer = isPrime($question) ? 'yes' : 'no';
    return [$question, $answer];
}

function run()
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }
        
    flow(GAME_DESCRIPTION, $questionAndAnswer);
}
