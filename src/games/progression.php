<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Flow\flow;

const GAMERULE = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function run()
{
    function getQuestionAndAnswer()
    {
        $step = random_int(1, 10);
        $firstItem = random_int(1, 10);
        $lastItem = $firstItem + (PROGRESSION_LENGTH * $step - $step);
        $progression = range($firstItem, $lastItem, $step);
        $missedItemKey = random_int(0, 9);
        $answer = $progression[$missedItemKey];
        $progression[$missedItemKey] = '..';
        return [implode(' ', $progression), $answer];
    }

    for ($i = 0; $i < 3; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }
    
    flow(GAMERULE, $questionAndAnswer);
}
