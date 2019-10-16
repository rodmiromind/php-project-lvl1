<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Flow\flow;

function run()
{
    function getQuestionAndAnswer()
    {
        $step = random_int(1, 10);
        $firstItem = random_int(1, 10);
        $arrayCount = 9;
        $lastItem = $firstItem + $step * $arrayCount;
        $progressionArray = range($firstItem, $lastItem, $step);
        $missedItemKey = random_int(0, 9);
        $progressionArray[] = $progressionArray[$missedItemKey];
        $progressionArray[$missedItemKey] = '..';
        return $progressionArray;
    }

    for ($i = 0; $i < 3; $i++) {
        $questionAndAnswer = getQuestionAndAnswer();
        $correctAnswers[] = $questionAndAnswer[10];
        $questions[] = implode(' ', array_slice($questionAndAnswer, 0, 10));
    }
    $gameRules = 'What number is missing in the progression?';
    flow($gameRules, $questions, $correctAnswers);
}
