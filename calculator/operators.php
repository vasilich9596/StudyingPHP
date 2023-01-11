<?php

include_once __DIR__.'/history.php';

function calculator_add($ls, $rs)
{
    return $ls + $rs ;
}

function calculator_sub($ls, $rs)
{
    return $ls - $rs ;
}

function calculator_mul($ls, $rs)
{
    return $ls * $rs ;
}

function calculator_div($ls, $rs)
{
    return $ls / $rs ;
}

function calculator_pov($ls, $rs)
{
    return pow($ls,$rs);
}

function calculator_cos($ls): float
{
    $radian = deg2rad($ls);
    return cos($radian);
}

function calculator_sin($ls): float
{
    $radian = deg2rad($ls);
    return sin($radian);
}

function calculator_sqrt($ls): float
{
    return sqrt($ls);
}

function calculator_square($ls)
{
    return $ls * $ls;
}

function calculator_cube($ls)
{
    return $ls * $ls * $ls;
}

function calculator_pi(): float
{
    return pi();
}

function calculator_abs($ls)
{
    return abs($ls);
}

function calculator_logTen($ls): float
{
    return log10($ls);
}

function calculator_log($ls): float
{
    return log($ls);
}

function get_calculator_history($countHistories = null)
{
    $historyContent = file_get_contents(CALCULATOR_HISTORY_FILE_PATH);

    $histories = json_decode($historyContent,true);
    $histories = array_reverse($histories);

    if ($countHistories !== null){
        $histories = array_slice($histories, 0, $countHistories);
    }

    $normalizedHistories = [];

    foreach ($histories as $history) {
        $normalizedHistories[] = $history['command'].' result '.$history['result'];
    }

    return implode(PHP_EOL,$normalizedHistories);
}

