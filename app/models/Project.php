<?php

class Project extends BaseModel
{
    protected $table = "projects";

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function client()
    {
        return $this->belongsTo('Client');
    }

    public static function validateAndCreate(Illuminate\Http\Request $request, User $user, Client $client)
    {
        $validator = new ProjectValidator();
        $projectCreator = new ProjectCreator();

        $validator->validate($request);
        $project = $projectCreator->createProject($request, $user, $client);
       
        return $project;
    }

    public static function validateAndUpdate(Project $project, Illuminate\Http\Request $request, User $user, $client)
    {
        $validator = new projectValidator();
        $projectUpdater = new projectUpdater();
        
        $validator->validate($request);

        $project = $projectUpdater->updateProject($project, $request, $user, $client);
        
        return $project;
    }

    // Mutator to format dates in the following fields
    public function getDates()
    {
        return array('created_at', 'updated_at', 'deleted_at', 'due_date', 'project_submitted_date', 'invoice_submitted_date', 'pay_date', 'invoice_approval_date', 'payment_received');
    }

    public static function checkForDate($field)
    {
        return (strpos($field, '-0001'))===false && !empty($field);
    }

}