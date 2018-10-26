<?php

namespace Authentication;

use Authentication\Entity\User;
use Authentication\Exception\DisabledUserException;
use Authentication\Exception\InactiveUserException;

class UserChecker
{
    public static function checkUser(User $user)
    {
        if ($user->isDisabled()) {
            throw new DisabledUserException();
        }

        if (!$user->isActive()) {
            throw new InactiveUserException();
        }
    }
}
