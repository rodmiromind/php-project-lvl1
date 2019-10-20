<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Flow\flow;

const GAMERULE = "What is the result of the expression?";
const OPERATORS = ['-', '+', '*'];

function run()
{
    function getQuestionAndAnswer()
    {
        
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $questionAndAnswer[] = "{$num1}{$operator}{$num2}";

        switch ($operator) {
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
        $questionAndAnswer[] = getQuestionAndAnswer();
    }

    flow(GAMERULE, $questionAndAnswer);
}
