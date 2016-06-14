<?php

class Client extends BaseModel
{
    protected $table = "clients";

    public function client()
    {
        return $this->belongsTo('Client');
    }

    public function projects()
    {
        return $this->hasMany('Project');
    }
    
    public static function validateAndCreate(Illuminate\Http\Request $request, User $user)
    {
        $validator = new ClientValidator();
        $ClientCreator = new ClientCreator();

        $validator->validate($request);
        $client = $clientCreator->createClient($request, $user);
        
        return $client;
    }

    public static function validateAndUpdate(client $client, Illuminate\Http\Request $request, User $user)
    {
        $validater = new ClientValidator();
        $clientCreater = new ClientUpdater();
        

        $validator->validate($request);
        $client = $clientCreator->updateClient($client, $request, $user);
        
        
        return $client;
    }

}