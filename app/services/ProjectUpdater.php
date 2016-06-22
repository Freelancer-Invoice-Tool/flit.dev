<?php 

class ProjectUpdater {
    public function updateProject(Project $project, Illuminate\Http\Request $request, User $user, $client) {
        $project->user_id = $user->id;
        $project->client_id = $client->id;
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->project_notes = $request->input('project_notes');
        $project->due_date = parseDates($request->input('due_date'));
        $project->invoice_submitted_date = parseDates($request->input('invoice_submitted_date'));
        $project->project_submitted_date = parseDates($request->input('project_submitted_date'));
        $project->invoice_approval_date = parseDates($request->input('invoice_approval_date'));
        $project->pay_date = parseDates($request->input('pay_date'));
        $project->budgeted_amount = $request->input('budgeted_amount');
        $project->actual_amount = $request->input('actual_amount');
        $project->project_submitted = $request->input('project_submitted');
        $project->invoice_submitted = $request->input('invoice_submitted');
        $project->payment_received = parseDates($request->input('payment_received'));

        $projectStatus = $request->input('project_status');
        $project->project_status = $projectStatus;

        if ($projectStatus == 'Invoice Submitted' && $project->invoice_submitted_date == '') {
            $project->invoice_submitted_date = parseDates('now');
        }elseif($projectStatus == 'Invoice Approved' &&  $project->invoice_approval_date == ''){
            $project->invoice_approval_date = parseDates('now');
        }elseif ($projectStatus == 'Project Submitted' && $project->project_submitted_date == '') {
           $project->project_submitted_date = parseDates('now');
        }elseif ($projectStatus == 'Payment Received' && $project->payment_received == '') {
            $project->payment_received = parseDates('now');
        }        

        if ($request->input('project_poc_name')) {
            $project->project_poc_name=$request->input('project_poc_name');
        } else {
            $project->project_poc_name=$client->main_poc_name;
        }
        if ($request->input('project_poc_email')) {
            $project->project_poc_email=$request->input('project_poc_email');
        } else {
            $project->project_poc_email=$client->main_poc_email;
        }
        if ($request->input('project_poc_phone')) {
            $project->project_poc_phone=$request->input('project_poc_phone');
        } else {
            $project->project_poc_phone=$client->main_poc_phone;
        }
        if ($request->input('project_poc_address')) {
            $project->project_poc_address=$request->input('project_poc_address');
        } else {
            $project->project_poc_address=$client->main_poc_email;
        }

        if ($project->save() === false) {
            throw new RecordNotSavedException("Project failed to save, this should never happen. Investigate!");
        } 

        return $project;
    }
}