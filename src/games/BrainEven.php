<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function BrainGames\Flow\flow;

function run()
{

    function getQuestion()
    {
        return random_int(1, 100);
    }

    function findCorrectAnswer($question)
    {
        return $question % 2 === 0 ? 'yes' : 'no';
    }

    for ($i = 0; $i < 3; $i++) {
        $question = getQuestion();
        $questions[] = $question;
        $correctAnswers[] = findCorrectAnswer($question);
    }
    $gameRules = line('Answer "yes" if number even otherwise answer "no".');
    
    

    flow($gameRules, $questions, $correctAnswers);
}
