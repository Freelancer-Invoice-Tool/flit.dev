<?php 
function parseDates($dateString)
{
    if($dateString!=''){
        $possibleDate = new DateTime($dateString);
        $result = $possibleDate->format('Y-m-d');
    } else {
        $result='';
    }

    return $result;

}

function calculatePayDate($client, $project)
{
    $paymentTerm = $client->payment_terms;

    $invoiceStatus = $client->submission_or_approval;

    if($invoiceStatus = 'submission'){
        $payCountStart = $project->invoice_submitted_date;   
    }elseif($invoiceStatus = 'approval'){
        $payCountStart = $project->invoice_approval_date;
    }

    return $payCountStart->addDays($paymentTerm);
}