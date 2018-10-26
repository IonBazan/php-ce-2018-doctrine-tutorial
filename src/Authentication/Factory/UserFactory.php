<?php

namespace Authentication\Factory;

use Authentication\Entity\User;

class UserFactory
{
    public static function createUser(string $emailAddress, string $passwordHash)
    {
        $user = new User();
        $user->setEmailAddress($emailAddress);
        $user->setPasswordHash($passwordHash);

        return $user;
    }
}
