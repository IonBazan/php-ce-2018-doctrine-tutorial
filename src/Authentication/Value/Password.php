<?php

namespace Authentication\Value;

final class Password
{
    /**
     * @var string
     */
    private $value;

    private function __construct()
    {
    }

    public static function fromString(string $value)
    {
        if (strlen($value) < 8) {
            throw new \InvalidArgumentException('Password too short');
        }

        $password = new static();
        $password->value = $value;

        return $password;
    }

    public function makeHash(): PasswordHash
    {
        return PasswordHash::fromHash(\password_hash($this->value, \PASSWORD_DEFAULT));
    }

    public function verify(PasswordHash $passwordHash): bool
    {
        return \password_verify($this->value, $passwordHash);
    }
}
