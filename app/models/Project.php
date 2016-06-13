<?php

class Project extends BaseModel
{
    protected $table = "projects";

    public function project()
    {
        return $this->belongsTo('Project');
    }

    public static function validateAndCreate(Illuminate\Http\Request $request, User $user)
    {
        $validator = new ProjectValidator();
        $projectCreator = new ProjectCreator();

        $validator->validate($request);
        $project = $projectCreator->createProject($request, $user);
       
        
        return $project;
    }

    public static function validateAndUpdate(Project $project, Illuminate\Http\Request $request, User $user)
    {
        $validater = new projectValidator();
        $projectCreater = new projectUpdater();
        

        $validator->validate($request);
        $project = $projectCreator->updateProject($project, $request, $user);
        
        
        return $project;
    }
}