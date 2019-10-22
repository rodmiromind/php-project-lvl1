<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Flow\flow;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;
const NUMBERS_OF_ROUNDS = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 10;

function getQuestionAndAnswer()
{
    $step = random_int(MIN_NUMBER, MAX_NUMBER);
    $firstItem = random_int(MIN_NUMBER, MAX_NUMBER);
    $lastItem = $firstItem + (PROGRESSION_LENGTH * $step - $step);
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
