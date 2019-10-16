<?php

namespace BrainGames\BrainProgression;

use function BrainGames\Flow\flow;

function run()
{
    function getQuestionAndAnswer()
    {
        $step = random_int(1, 10);
        $firstitem = random_int(1, 10);
        $lastitem = $firstitem + $step * 9;
        $question = range($firstitem, $lastitem, $step);
        $missedItemKey = random_int(0, 9);
        $question[] = $question[$missedItemKey];
        $question[$missedItemKey] = '..';
        return $question;
    }

    for ($i = 0; $i < 3; $i++) {
        $questionAndAnswer = getQuestionAndAnswer();
        $correctAnswers[] = $questionAndAnswer[10];
        $questions[] = implode(' ', array_slice($questionAndAnswer, 0, 10));
    }
    $gameRules = 'What number is missing in the progression?';
    flow($gameRules, $questions, $correctAnswers);
}
