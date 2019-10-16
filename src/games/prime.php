<?php

namespace BrainGames\Prime;

use function BrainGames\Flow\flow;

function run()
{

    function getNumber()
    {
        return random_int(2, 100);
    }

    function isPrime($num)
    {
        if ($num % 2 === 0) {
            return "no";
        }
        for ($i = 3; $i <= floor($num / 2); $i++) {
            if ($num % $i === 0) {
                return "no";
            }
        }

        return "yes";
    }

    for ($i = 0; $i < 3; $i++) {
        $question = getNumber();
        $questions[] = $question;
        $correctAnswers[] = isPrime($question);
    }
    
    $gameRules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    flow($gameRules, $questions, $correctAnswers);
}
