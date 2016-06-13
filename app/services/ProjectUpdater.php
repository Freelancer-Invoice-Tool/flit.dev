<?php 

class ProjectUpdater {
    public function updateProject(Project $project, Illuminate\Http\Request $request, User $user) {
        $project->user_id = $user->id;
        $project->client_id = $client_id;
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->due_date = $request->input('due_date');
        $project->project_submitted_date = $request->input('project_submitted_date');
        $project->invoice_submitted_date = $request->input('invoice_submitted_date');
        $project->invoice_approval_date = $request->input('invoice_approval_date');
        $project->pay_date = $request->input('pay_date');
        $project->payment_received = $request->input('payment_received');
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