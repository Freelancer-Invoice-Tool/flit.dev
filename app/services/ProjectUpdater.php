<?php 

class ProjectUpdater {
    public function updateProject(Project $project, Illuminate\Http\Request $request, User $user, $client) {
        $project->user_id = $user->id;
        $project->client_id = $client->id;
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->project_notes = $request->input('project_notes');
        $project->due_date = parseDates($request->input('due_date'));
        $project->project_submitted_date = parseDates($request->input('project_submitted_date'));
        $project->invoice_submitted_date = parseDates($request->input('invoice_submitted_date'));
        $project->invoice_approval_date = parseDates($request->input('invoice_approval_date'));
        $project->pay_date = parseDates($request->input('pay_date'));
        // dd("I'm still working");
        $project->project_status = $request->input('project_status');
        $project->project_submitted = $request->input('project_submitted');
        $project->invoice_submitted = $request->input('invoice_submitted');
        $project->payment_received = parseDates($request->input('payment_received'));
        $project->project_poc_name = $request->input('project_poc_name');
        $project->project_poc_email = $request->input('project_poc_email');
        $project->project_poc_phone = $request->input('project_poc_phone');
        $project->project_poc_address = $request->input('project_poc_address');

        if ($project->save() === false) {
            throw new RecordNotSavedException("Project failed to save, this should never happen. Investigate!");
        } 

        return $project;
    }
}