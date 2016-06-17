<?php

class ProjectValidator {
    public $rules = [
        'name' => 'required',
        'due_date' => 'required|date'
    ];

    public function validate(Illuminate\Http\Request $request) {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            throw new ValidationException($validator, "The project input is invalid");
        }
    }
}