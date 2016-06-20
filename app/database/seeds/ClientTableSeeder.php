<?php

class ClientTableSeeder extends Seeder
{
    public function run()
    {

        $client = new Client();
        $client->user_id = User::id(1);
        $client->payment_terms = 60;
        $client->submission_or_approval = 'submission';
        $client->client_name = 'Stark Industries';
        $client->main_poc_name = 'Pepper Potts';
        $client->main_poc_email = 'ppotts@stark.com';
        $client->main_poc_phone = '(800) 555-5277';
        $client->main_poc_address = 'Stark Industries, Los Angeles, CA';  
        $client->save();

        $client = new Client();
        $client->user_id = User::id(2);
        $client->payment_terms = 60;
        $client->submission_or_approval = 'submission';
        $client->client_name = 'Stark Industries';
        $client->main_poc_name = 'Pepper Potts';
        $client->main_poc_email = 'ppotts@stark.com';
        $client->main_poc_phone = '(800) 555-5277';
        $client->main_poc_address = 'Stark Industries, Los Angeles, CA';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(3);
        $client->payment_terms = 60;
        $client->submission_or_approval = 'submission';
        $client->client_name = 'Stark Industries';
        $client->main_poc_name = 'Pepper Potts';
        $client->main_poc_email = 'ppotts@stark.com';
        $client->main_poc_phone = '(800) 555-5277';
        $client->main_poc_address = 'Stark Industries, Los Angeles, CA';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(3);
        $client->payment_terms = 30;
        $client->submission_or_approval = 'submission';
        $client->client_name = 'Law Offices of Nelson and Murdock';
        $client->main_poc_name = 'Matt Murdock';
        $client->main_poc_email = 'mmurdock@nelsonmurdock.com';
        $client->main_poc_phone = '';
        $client->main_poc_address = 'Hell\'s Kitchen, New York City, NY';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(2);
        $client->payment_terms = 30;
        $client->submission_or_approval = 'submission';
        $client->client_name = 'Law Offices of Nelson and Murdock';
        $client->main_poc_name = 'Matt Murdock';
        $client->main_poc_email = 'mmurdock@nelsonmurdock.com';
        $client->main_poc_phone = '';
        $client->main_poc_address = 'Hell\'s Kitchen, New York City, NY';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(1);
        $client->payment_terms = 30;
        $client->submission_or_approval = 'submission';
        $client->client_name = 'Law Offices of Nelson and Murdock';
        $client->main_poc_name = 'Matt Murdock';
        $client->main_poc_email = 'mmurdock@nelsonmurdock.com';
        $client->main_poc_phone = '';
        $client->main_poc_address = 'Hell\'s Kitchen, New York City, NY';
        $client->save();
        
        $client = new Client();
        $client->user_id = User::id(1);
        $client->payment_terms = 45;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'Wayne Enterprises';
        $client->main_poc_name = 'Lucius Fox';
        $client->main_poc_email = 'lfox@wayne.com';
        $client->main_poc_phone = '(800) 555-2000';
        $client->main_poc_address = 'Wayne Tower, Gotham City';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(2);
        $client->payment_terms = 45;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'Wayne Enterprises';
        $client->main_poc_name = 'Lucius Fox';
        $client->main_poc_email = 'lfox@wayne.com';
        $client->main_poc_phone = '(800) 555-2000';
        $client->main_poc_address = 'Wayne Tower, Gotham City';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(3);
        $client->payment_terms = 45;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'Wayne Enterprises';
        $client->main_poc_name = 'Lucius Fox';
        $client->main_poc_email = 'lfox@wayne.com';
        $client->main_poc_phone = '(800) 555-2000';
        $client->main_poc_address = 'Wayne Tower, Gotham City';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(3);
        $client->payment_terms = 60;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'Queen Industries';
        $client->main_poc_name = 'Oliver Queen';
        $client->main_poc_email = 'oqueen@queenindustries.com';
        $client->main_poc_phone = '(800) 555-3456';
        $client->main_poc_address = 'Star City';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(2);
        $client->payment_terms = 60;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'Queen Industries';
        $client->main_poc_name = 'Oliver Queen';
        $client->main_poc_email = 'oqueen@queenindustries.com';
        $client->main_poc_phone = '(800) 555-3456';
        $client->main_poc_address = 'Star City';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(1);
        $client->payment_terms = 60;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'Queen Industries';
        $client->main_poc_name = 'Oliver Queen';
        $client->main_poc_email = 'oqueen@queenindustries.com';
        $client->main_poc_phone = '(800) 555-3456';
        $client->main_poc_address = 'Star City';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(2);
        $client->payment_terms = 60;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'SHIELD';
        $client->main_poc_name = 'Nick Fury';
        $client->main_poc_email = 'nfury@shield.gov';
        $client->main_poc_phone = '(800) 555-9876';
        $client->main_poc_address = 'Washington, DC';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(1);
        $client->payment_terms = 60;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'SHIELD';
        $client->main_poc_name = 'Nick Fury';
        $client->main_poc_email = 'nfury@shield.gov';
        $client->main_poc_phone = '(800) 555-9876';
        $client->main_poc_address = 'Washington, DC';
        $client->save();

        $client = new Client();
        $client->user_id = User::id(3);
        $client->payment_terms = 60;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'SHIELD';
        $client->main_poc_name = 'Nick Fury';
        $client->main_poc_email = 'nfury@shield.gov';
        $client->main_poc_phone = '(800) 555-9876';
        $client->main_poc_address = 'Washington, DC';
        $client->save();
    }
}