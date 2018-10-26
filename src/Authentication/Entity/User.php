<?php

namespace Authentication\Entity;

use Authentication\Value\EmailAddress;
use Authentication\Value\PasswordHash;

class User
{
    /** @var EmailAddress */
    public $emailAddress;

    /** @var PasswordHash */
    public $passwordHash;

    public function __construct(EmailAddress $emailAddress, PasswordHash $password)
    {
        $this->emailAddress = $emailAddress;
        $this->passwordHash = $password;
    }
}
