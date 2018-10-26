<?php

declare(strict_types=1);

namespace Infrastructure\Authentication\Repository;

use Authentication\Entity\User;
use Authentication\Repository\Users;
use Authentication\Value\EmailAddress;
use Authentication\Value\PasswordHash;

final class JsonFileUsers implements Users
{
    /** @var string */
    private $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function isRegistered(EmailAddress $emailAddress) : bool
    {
        return isset($this->existingUsers()[(string) $emailAddress]);
    }

    public function get(EmailAddress $emailAddress) : User
    {
        $passwordHash = $this->existingUsers()[(string) $emailAddress] ?? null;

        if (null === $passwordHash) {
            throw new \Exception(sprintf('User %s does not exist', $emailAddress));
        }

        $user = (new \ReflectionClass(User::class))
            ->newInstanceWithoutConstructor();

        $user->emailAddress = $emailAddress;
        $user->passwordHash = PasswordHash::fromHash((string) $passwordHash);

        return $user;
    }

    public function store(User $user) : void
    {
        $users = $this->existingUsers();

        $users[(string) $user->emailAddress] = (string) $user->passwordHash;

        file_put_contents($this->file, json_encode($users));
    }

    private function existingUsers() : array
    {
        return json_decode(file_get_contents($this->file), true);
    }
}
