<?php

namespace BrainGames\BrainCalc;

use function cli\line;
use function BrainGames\Flow\flow;

function run()
{

    function getQuestionsAndAnswers()
    {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $operators = ['-', '+', '*'];
        shuffle($operators);
        $questionAndAnswer[] = "{$num1}{$operators[0]}{$num2}";

        switch ($operators[0]) {
            case '-':
                $questionAndAnswer[] = $num1 - $num2;
                break;
            case '+':
                $questionAndAnswer[] = $num1 + $num2;
                break;
            case '*':
                $questionAndAnswer[] = $num1 * $num2;
                break;
        }
        
        return $questionAndAnswer;
    }

    for ($i = 0; $i < 3; $i++) {
        $questionsAndAnswer = getQuestionsAndAnswers();
        $questions[] = $questionAndAnswer[0];
        $correctAnswers[] = $questionAndAnswer[1];
    }

    $gameRules = line('What is the result of the expression?');
    flow($gameRules, $questions, $correctAnswers);
}
