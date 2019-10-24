<?php

namespace BrainGames\games\even;

use function BrainGames\flow\flow;

use const BrainGames\flow\NUMBERS_OF_ROUNDS;

const GAME_DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function isEven($number)
{
    return $number % 2 === 0;
}

function getQuestionAndAnswer()
{
    $question = random_int(MIN_NUMBER, MAX_NUMBER);
    $answer = isEven($question) ? 'yes' : 'no';
    return [$question, $answer];
}

function run()
{
    for ($i = 0; $i < NUMBERS_OF_ROUNDS; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }

    flow(GAME_DESCRIPTION, $questionAndAnswer);
}
