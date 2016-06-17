<?php 
function parseDates($dateString)
{
    if($dateString!=''){
        $possibleDate = new DateTime($dateString);
        $result = $possibleDate->format('Y-m-d');
    } else {
        $result='';
    }


    // if($result === '-0001-11-30'){

    //     return null;

    // }else{

        return $result;
    // }
}
