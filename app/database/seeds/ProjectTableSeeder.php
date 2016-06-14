<?php

class ProjectTableSeeder extends Seeder
{
    public function run()
    {   
        $project = new Project();
        $project->user_id = User::all()->random()->id;
        $project->client_id = Client::find(4)->id;
        $project->name = 'Batarang';
        $project->description = 'Bat-shaped boomerang.';
        $project->due_date = '2017-01-19';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Lucius Fox';
        $project->project_poc_email = '';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::all()->random()->id;
        $project->client_id = Client::find(3)->id;
        $project->name = 'Billy club';
        $project->description = 'Strong, collapsible walking stick.';
        $project->due_date = '2016-12-16';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Matt Murdock';
        $project->project_poc_email = 'mmurdock@nelsonmurdock.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::all()->random()->id;
        $project->client_id = Client::find(1)->id;
        $project->name = 'Arc Reactor';
        $project->description = 'Compact power source.';
        $project->due_date = '2016-05-06';
        $project->project_submitted_date = '2016-03-26';
        $project->invoice_submitted_date = '2016-05-21';
        $project->invoice_approval_date = '2016-06-05';
        $project->pay_date = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Tony Stark';
        $project->project_poc_email = 'tstark@stark.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::all()->random()->id;
        $project->client_id = Client::find(6)->id;
        $project->name = 'Shield';
        $project->description = 'Vibranium shield with red and white stripes and a white star in a blue circle in the middle.';
        $project->due_date = '2016-02-06';
        $project->project_submitted_date = '2016-02-01';
        $project->invoice_submitted_date = '2016-02-10';
        $project->invoice_approval_date = '2016-02-14';
        $project->pay_date = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Steve Rogers';
        $project->project_poc_email = 'srogers1920@aol.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();
        
    }
}