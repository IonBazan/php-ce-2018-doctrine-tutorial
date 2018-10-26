<?php

namespace Authentication\CommandHandler;

use Authentication\Encoder\PasswordEncoder;
use Authentication\Entity\User;
use Authentication\Exception\UserExistsException;
use Authentication\Command\RegisterCommand;
use Authentication\Factory\UserFactory;
use Authentication\Notification\UserCreatedNotification;
use Authentication\Repository\FilesystemUsers;

class RegistrationHandler
{
    public static function register(RegisterCommand $registerCommand)
    {
        $repository = new FilesystemUsers();

        $user = $repository->get($registerCommand->getEmailAddress());

        if ($user instanceof User) {
            throw new UserExistsException('User already exists');
        }

        $passwordHash = PasswordEncoder::encodePassword($registerCommand->getPassword());
        $user = UserFactory::createUser($registerCommand->getEmailAddress(), $passwordHash);
        $repository->store($user);

        UserCreatedNotification::notify($user);
    }
}
