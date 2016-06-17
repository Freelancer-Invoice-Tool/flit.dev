<?php 
function parseDates($dateString)
{
    $possibleDate = new DateTime($dateString);

    return $possibleDate->format('Y-m-d');
}
