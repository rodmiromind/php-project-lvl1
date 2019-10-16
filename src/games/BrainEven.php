<?php

namespace BrainGames\BrainEven;

use function BrainGames\Flow\flow;

function run()
{

    function getNumber()
    {
        return random_int(1, 100);
    }

    function getCorrectAnswer($number)
    {
        return $number % 2 === 0 ? 'yes' : 'no';
    }

    for ($i = 0; $i < 3; $i++) {
        $question = getNumber();
        $questions[] = $question;
        $correctAnswers[] = getCorrectAnswer($question);
    }
    
    $gameRules = 'Answer "yes" if number even otherwise answer "no".';
    flow($gameRules, $questions, $correctAnswers);
}
