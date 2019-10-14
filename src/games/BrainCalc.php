<?php

namespace BrainGames\BrainCalc;

use function cli\line;
use function BrainGames\Flow\flow;

function run()
{

    function getQuestionsAndAnswers()
    {
        $correctAnswers = [];
        $questions = [];
        for ($i = 0; $i < 3; $i++) {
            $num1 = random_int(1, 100);
            $num2 = random_int(1, 100);
            $operators = ['-', '+', '*'];
            shuffle($operators);
            $questions[] = "{$num1}{$operators[0]}{$num2}";

            switch ($operators[0]) {
                case '-':
                    $correctAnswers[] = $num1 - $num2;
                    break;
                case '+':
                    $correctAnswers[] = $num1 + $num2;
                    break;
                case '*':
                    $correctAnswers[] = $num1 * $num2;
                    break;
            }
        }
        return array_merge($questions, $correctAnswers);
    }

    $gameRules = line('What is the result of the expression?');
    $questionsAndAnswers = getQuestionsAndAnswers();
    $questions = array_slice($questionsAndAnswers, 0, 3);
    $correctAnswers = array_slice($questionsAndAnswers, 3, 3);

    flow($gameRules, $questions, $correctAnswers);
}
