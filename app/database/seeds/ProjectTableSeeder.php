<?php

class ProjectTableSeeder extends Seeder
{
    public function run()
    {   
        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(7)->id;
        $project->name = 'Batarang';
        $project->description = 'Bat-shaped boomerang.';
        $project->project_notes = '';
        $project->due_date = '2017-01-19';
        $project->hours_logged = '1000';
        $project->project_submitted_date = '2017-01-19';
        $project->invoice_submitted_date = '2017-01-20';
        $project->invoice_approval_date = '2017-01-27';
        $project->pay_date = '';
        $project->budgeted_amount = 150000;
        $project->actual_amount = 149560;
        $project->project_status = 'Payment Received';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '2017-02-27';
        $project->project_poc_name = 'Lucius Fox';
        $project->project_poc_email = '';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(6)->id;
        $project->name = 'Billy club';
        $project->description = 'Strong, collapsible walking stick.';
        $project->project_notes = '';
        $project->due_date = '2016-12-16';
        $project->hours_logged = '';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->budgeted_amount = 500;
        $project->actual_amount= 0;
        $project->project_status = 'In Progress';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Matt Murdock';
        $project->project_poc_email = 'mmurdock@nelsonmurdock.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(1)->id;
        $project->name = 'Arc Reactor';
        $project->description = 'Compact power source.';
        $project->project_notes = '';
        $project->due_date = '2016-05-06';
        $project->hours_logged = '';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->budgeted_amount = 15000000;
        $project->actual_amount = 0;
        $project->project_status = 'Started';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Tony Stark';
        $project->project_poc_email = 'tstark@stark.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(13)->id;
        $project->name = 'Shield';
        $project->description = 'Vibranium shield with red and white stripes and a white star in a blue circle in the middle.';
        $project->project_notes = '';
        $project->due_date = '2016-02-06';
        $project->hours_logged = '4000';
        $project->project_submitted_date = '2016-02-01';
        $project->invoice_submitted_date = '2016-02-10';
        $project->invoice_approval_date = '2016-02-12';
        $project->pay_date = '2016-04-12';
        $project->budgeted_amount = 5000000;
        $project->actual_amount = 0;
        $project->project_status = 'Invoice Approved';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Steve Rogers';
        $project->project_poc_email = 'srogers1920@aol.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(13)->id;
        $project->name = 'Indestructable Motorcycle';
        $project->description = 'A bike that won\'t break in a little fender-bender.';
        $project->project_notes = '';
        $project->due_date = '2015-01-19';
        $project->hours_logged = '10000';
        $project->project_submitted_date = '2015-01-19';
        $project->invoice_submitted_date = '2015-01-19';
        $project->invoice_approval_date = '2015-02-20';
        $project->pay_date = '';
        $project->budgeted_amount = 60000;
        $project->actual_amount = 65000;
        $project->project_status = 'Payment Received';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '2016-02-21';
        $project->project_poc_name = 'Black Widow';
        $project->project_poc_email = 'natasha@nunya.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(13)->id;
        $project->name = 'Expandable pants';
        $project->description = 'Pants that will expand without shredding, and shrink back.';
        $project->project_notes = '';
        $project->due_date = '2015-07-19';
        $project->hours_logged = '';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->budgeted_amount = 1000;
        $project->actual_amount = 0;
        $project->project_status = 'In Progress';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Bruce Banner';
        $project->project_poc_email = 'smash@msn.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(7)->id;
        $project->name = 'Unhackable Database Application';
        $project->description = 'An application to store personal information about colleagues.';
        $project->project_notes = '';
        $project->due_date = '2015-08-01';
        $project->hours_logged = '9';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->budgeted_amount = 250000;
        $project->actual_amount = 0;
        $project->project_status = 'Started';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Bruce Wayne';
        $project->project_poc_email = 'secrets@juno.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(4)->id;
        $project->name = 'Text Reader';
        $project->description = 'Text reader capable of recognizing legal jargon.';
        $project->project_notes = '';
        $project->due_date = '2016-09-08';
        $project->hours_logged = '88';
        $project->project_submitted_date = '2016-09-07';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->budgeted_amount = 500;
        $project->budgeted_amount = 0;
        $project->project_status = 'Project Submitted';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Matt Murdock';
        $project->project_poc_email = 'mmurdock@nelsonmurdock.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(1)->id;
        $project->name = 'AI Backup';
        $project->description = 'Complex database, storage, and security.';
        $project->project_notes = '';
        $project->due_date = '2015-12-01';
        $project->hours_logged = '1100';
        $project->project_submitted_date = '2015-11-30';
        $project->invoice_submitted_date = '2015-11-30';
        $project->invoice_approval_date = '2015-12-08';
        $project->pay_date = '2016-01-30';
        $project->budgeted_amount = 500000;
        $project->actual_amount = 0;
        $project->project_status = 'Invoice Approved';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Pepper Potts';
        $project->project_poc_email = 'ppotts@stark.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(13)->id;
        $project->name = 'Trivia game';
        $project->description = 'Educational teaching tool on all significant events and people since end of WWII.';
        $project->project_notes = '';
        $project->due_date = '2011-08-30';
        $project->hours_logged = '45';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->budgeted_amount = 850750;
        $project->actual_amount = 0;
        $project->project_status = 'In Progress';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Steve Rogers';
        $project->project_poc_email = 'srogers1920@aol.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(10)->id;
        $project->name = 'Assault Drone';
        $project->description = '';
        $project->project_notes = '';
        $project->due_date = '2011-08-30';
        $project->hours_logged = '9098';
        $project->project_submitted_date = '2016-06-24';
        $project->invoice_submitted_date = '2016-06-27';
        $project->invoice_approval_date = '2016-06-29';
        $project->pay_date = '2016-08-29';
        $project->budgeted_amount = 850750;
        $project->actual_amount = 0;
        $project->project_status = 'Invoice Approved';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Oliver Queen';
        $project->project_poc_email = 'oqueen@queenindustries.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(7)->id;
        $project->name = 'Utility Belt';
        $project->description = 'Incredibly bulky supersuit accessory that is as impractical as it is awesome';
        $project->project_notes = '';
        $project->due_date = '2016-07-14';
        $project->hours_logged = '3';
        $project->project_submitted_date = '';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->budgeted_amount = 850750;
        $project->actual_amount = 0;
        $project->project_status = 'In Progress';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Bruce Wayne';
        $project->project_poc_email = 'bruce.wayne@wayneent.net';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();

        $project = new Project();
        $project->user_id = User::find(1)->id;
        $project->client_id = Client::find(4)->id;
        $project->name = 'Inventory System for Rosary Bead Collection';
        $project->description = 'Need to track concerning number of rosary beads';
        $project->project_notes = '';
        $project->due_date = '2016-08-09';
        $project->hours_logged = '';
        $project->project_submitted_date = '2016-07-30';
        $project->invoice_submitted_date = '';
        $project->invoice_approval_date = '';
        $project->pay_date = '';
        $project->budgeted_amount = 850750;
        $project->actual_amount = 0;
        $project->project_status = 'Project Submitted';
        $project->project_submitted = '';
        $project->invoice_submitted = '';
        $project->payment_received = '';
        $project->project_poc_name = 'Matt Murdock';
        $project->project_poc_email = 'mmurdock@nelsonmurdock.com';
        $project->project_poc_phone = '';
        $project->project_poc_address = '';
        $project->save();
    }
}