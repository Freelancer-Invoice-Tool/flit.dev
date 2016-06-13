<?php

class ProjectValidator {
    public $rules = [
        'client_name' => 'required',
    ];

    public function validate(Illuminate\Http\Request $request) {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            throw new ValidationException($validator, "The client input is invalid");
        }
    }
}