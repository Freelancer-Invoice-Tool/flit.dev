<?php 

class ClientUpdater {
    public function updateclient(Client $client, Illuminate\Http\Request $request, User $user) {
        $client->user_id = $user->id;
        $client->payment_terms = $request->input('payment_terms');
        $client->submission_or_approval = $request->input('submission_or_approval');
        $client->client_name = $request->input('client_name');
        $client->main_poc_name = $request->input('main_poc_name');
        $client->main_poc_email = $request->input('main_poc_email');
        $client->main_poc_phone = $request->input('main_poc_phone');
        $client->main_poc_address = $request->input('main_poc_address');

        if ($client->save() === false) {
            throw new RecordNotSavedException("Client failed to save, this should never happen. Investigate!");
        } 

        return $client;
    }
}