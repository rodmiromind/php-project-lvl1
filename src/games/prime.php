<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Flow\flow;

const GAMERULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{

    function isPrime($num)
    {
        if ($num % 2 === 0) {
            return false;
        }
        for ($i = 3; $i <= floor($num / 2); $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }

        return true;
    }

    function getCorrectAnswer($number)
    {
        return isPrime($number) ? 'yes' : 'no';
    }

    function getQuestionAndAnswer()
    {
        $question = random_int(2, 100);
        $answer = getCorrectAnswer($question);
        return [$question, $answer];
    }

    for ($i = 0; $i < 3; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }
        
    flow(GAMERULE, $questionAndAnswer);
}
