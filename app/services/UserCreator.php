<?php 
class UserCreator {
    public function createUser(Illuminate\Http\Request $request) {
        $user = new User;
        
        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = $request->input("$_ENV['USER_PASSWORD']");
      
        
        if ($user->save() === false) {
            throw new RecordNotSavedException("User failed to save, this should never happen. Investigate!");
        } 

        return $user;
    }
}