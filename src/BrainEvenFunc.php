<?php

namespace BrainGames\BrainEvenFunc;

function findCorrectAnswer($num)
{
    return $num % 2 === 0 ? 'yes' : 'no';
}

function getNumber()
{
    return random_int(1, 1000);
}
