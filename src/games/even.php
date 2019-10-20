<?php

namespace BrainGames\Games\Even;

use function BrainGames\Flow\flow;

const GAMERULE = 'Answer "yes" if number even otherwise answer "no".';

function run()
{

    function getQuestion()
    {
        return random_int(1, 100);
    }

    function isEven($number)
    {
        return $number % 2 === 0;
    }

    function getCorrectAnswer($number)
    {
        return isEven($number) ? 'yes' : 'no';
    }

    function getQuestionAndAnswer()
    {
        $question = getQuestion();
        $answer = getCorrectAnswer($question);
        return [$question, $answer];
    }

    for ($i = 0; $i < 3; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }
        
    flow(GAMERULE, $questionAndAnswer);
}
