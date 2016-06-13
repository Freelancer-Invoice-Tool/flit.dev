<?php

class ClientTableSeeder extends Seeder
{
    public function run()
    {

        $client = new Client();
        $client->user_id = User::all()->random()->id;
        $client->payment_terms = 60;
        $client->submission_or_approval = 'submission';
        $client->client_name = 'Disney';
        $client->main_poc_name = 'Mickey Mouse';
        $client->main_poc_email = 'mickey@disney.com';
        $client->main_poc_phone = '(407) 939-5277';
        $client->main_poc_address = 'Walt Disney World Resort, Orlando, FL 32830';  
        $client->save();

        $client = new Client();
        $client->user_id = User::all()->random()->id;
        $client->payment_terms = 60;
        $client->submission_or_approval = 'submission';
        $client->client_name = 'Disney';
        $client->main_poc_name = 'Mickey Mouse';
        $client->main_poc_email = 'mickey@disney.com';
        $client->main_poc_phone = '(407) 939-5277';
        $client->main_poc_address = 'Walt Disney World Resort, Orlando, FL 32830';
        $client->save();

        $client = new Client();
        $client->user_id = User::all()->random()->id;
        $client->payment_terms = 30;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'POTUS';
        $client->main_poc_name = 'Barack Obama';
        $client->main_poc_email = 'barryo@whitehouse.gov';
        $client->main_poc_phone = '';
        $client->main_poc_address = '1600 Pennsylvania Ave';
        $client->save();
        
        $client = new Client();
        $client->user_id = User::all()->random()->id;
        $client->payment_terms = 45;
        $client->submission_or_approval = 'approval';
        $client->client_name = 'Trump, Inc';
        $client->main_poc_name = 'Donald Trump';
        $client->main_poc_email = 'donald@trump.com';
        $client->main_poc_phone = '(212) 832-2000';
        $client->main_poc_address = '725 5th Ave, New York, NY 10022';
        $client->save();


    }
}