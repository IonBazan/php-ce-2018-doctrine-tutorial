<?php

namespace Authentication\Encoder;

class PasswordEncoder
{
    public static function encodePassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
