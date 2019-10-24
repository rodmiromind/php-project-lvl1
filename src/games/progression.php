<?php

namespace BrainGames\games\progression;

use function BrainGames\flow\flow;

use const BrainGames\flow\NUMBERS_OF_ROUNDS;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;
const MIN_NUMBER = 1;
const MAX_NUMBER = 10;

function getQuestionAndAnswer()
{
    $step = random_int(MIN_NUMBER, MAX_NUMBER);
    $firstItem = random_int(MIN_NUMBER, MAX_NUMBER);
    $lastItem = $firstItem + ((PROGRESSION_LENGTH - 1) * $step);
    $progression = range($firstItem, $lastItem, $step);
    $missedItemKey = random_int(0, PROGRESSION_LENGTH - 1);
    $answer = $progression[$missedItemKey];
    $progression[$missedItemKey] = '..';
    return [implode(' ', $progression), $answer];
}

function run()
{
    for ($i = 0; $i < NUMBERS_OF_ROUNDS; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }
    
    flow(GAME_DESCRIPTION, $questionAndAnswer);
}
