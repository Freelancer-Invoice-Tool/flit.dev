<?php

class UserValidator {
    public $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

    public function validate(Illuminate\Http\Request $request) {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            throw new ValidationException($validator, "The user input is invalid");
        }
    }
}