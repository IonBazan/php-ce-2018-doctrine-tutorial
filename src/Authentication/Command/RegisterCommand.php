<?php

namespace Authentication\Command;

use Authentication\Exception\ValidationException;

class RegisterCommand
{
    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var string
     */
    protected $password;

    public function __construct(string $emailAddress, string $password)
    {
        if (!strlen($emailAddress) || !strlen($password)) {
            throw new ValidationException('You must provide email and password');
        }

        $this->emailAddress = $emailAddress;
        $this->password = $password;
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
