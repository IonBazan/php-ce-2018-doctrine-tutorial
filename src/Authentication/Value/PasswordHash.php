<?php

namespace Authentication\Value;

final class PasswordHash
{
    /**
     * @var string
     */
    private $hash;

    public static function fromHash(string $hash): PasswordHash
    {
        $passwordHash = new static();
        $passwordHash->hash = $hash;

        return $passwordHash;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function __toString(): string
    {
        return $this->getHash();
    }

    public function verify(Password $password): bool
    {
        return \password_verify($password->getPassword(), $this->hash);
    }
}
