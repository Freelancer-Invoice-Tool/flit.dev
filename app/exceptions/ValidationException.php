<?php

class ValidationException extends Exception {
    public $validator;

    public function __construct($validator, $message = "") {
        $this->validator = $validator;
        $this->message = $message;
    }
}