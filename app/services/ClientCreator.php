<?php 
class ClientCreator {
    public function createClient(Illuminate\Http\Request $request, User $user) {
        $name=$request->input('client_name');
        $isNotDuplicate = Client::where('user_id', '=', Auth::id())
            ->where('client_name', '=', $name)->first();
        // dd($isDuplicate);

        if(empty($isNotDuplicate)) {
            $client = new Client;
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

        } else {
            $client=$isNotDuplicate;
            return $client;
        }
    }
}