<?php

namespace Infrastructure\Authentication\Validator;

class EmailValidator
{
    public static function isValid(string $email)
    {
        return \filter_var($email, \FILTER_VALIDATE_EMAIL);
    }
}
