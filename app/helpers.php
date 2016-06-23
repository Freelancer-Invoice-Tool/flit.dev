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

    $clientPaymentPolicy = $client->submission_or_approval;
    $projectHasInvoiceApprovalDate = !empty($project->invoice_approval_date) &&
                                      strpos($project->invoice_approval_date->format('Y'), '-') !== 0;

    if($clientPaymentPolicy == 'submission'){
        $payCountStart = $project->invoice_submitted_date;   
    }elseif($clientPaymentPolicy == 'approval' && $projectHasInvoiceApprovalDate){
        $payCountStart = $project->invoice_approval_date;
    } else {
        return null;
    }

    return $payCountStart->addDays($paymentTerm);
}

function sendMail($view, $toEmail, $toHuman, $subject, $data = [])
{
    Mail::later(30, $view, $data, function($message) use ($toEmail, $toHuman, $subject)
    {
        $message->to($toEmail, $toHuman)->subject($subject);
    });
}