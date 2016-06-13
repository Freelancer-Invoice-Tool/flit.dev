<?php

class ProjectTableSeeder extends Seeder
{
    public function run()
    {   
        $project = new Project();
        $project->user_id = User::all()->random()->id;
        $project->client_id = Client::find(4)->id;
        $project->name = 'Inauguration speech';
        $project->description = 'The most fabulous inauguration speech ever.';
        $project->due_date = '2017-01-19';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Ivanka Trump';
        $project->project_poc_email = 'ivanka@trump.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::all()->random()->id;
        $project->client_id = Client::find(3)->id;
        $project->name = 'Vacation plans';
        $project->description = '4-8 year tour of Europe';
        $project->due_date = '2016-12-16';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Michelle Obama';
        $project->project_poc_email = 'mobama@whitehouse.gov';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::all()->random()->id;
        $project->client_id = Client::find(1)->id;
        $project->name = 'Captain America: Civil War';
        $project->description = 'Short film';
        $project->due_date = '2016-05-06';
        $project->project_submitted_date = '2016-03-26';
        $project->invoice_submitted_date = '2016-05-21';
        $project->invoice_approval_date = '2016-06-05';
        $project->pay_date = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Russo Brothers';
        $project->project_poc_email = 'brother1@russo.com';
        $project->project_poc_phone = '555-123-4567';
        $project->project_poc_address = '';
        $project->save();
        
    }
}