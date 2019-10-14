<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function BrainGames\Flow\flow;

function run()
{

    function findCorrectAnswer($questions)
    {
        $correctAnswers = [];
        foreach ($questions as $question) {
            $correctAnswers[] = $question % 2 === 0 ? 'yes' : 'no';
        }
        return $correctAnswers;
    }

    $gameRules = line('Answer "yes" if number even otherwise answer "no".');
    $questions = [random_int(1, 100),random_int(1, 100),random_int(1, 100)];
    $correctAnswers = findCorrectAnswer($questions);

    flow($gameRules, $questions, $correctAnswers);
}
