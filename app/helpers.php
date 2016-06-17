<?php 
function parseDates($dateString)
{
    $possibleDate = new DateTime($dateString);

    $result = $possibleDate->format('Y-m-d');

    if($result === '-0001-11-30'){

        return null;

    }else{

        return $result;
    }
}
