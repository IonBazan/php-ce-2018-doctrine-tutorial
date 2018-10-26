<?php

namespace Authentication\Repository;

use Authentication\Entity\User;

class FilesystemUsers implements Users
{
    /**
     * @var User[]
     */
    protected $database = [];

    /**
     * @var string
     */
    protected $fileName;

    public function __construct(string $fileName = __DIR__ . '/../../../data/db')
    {
        $this->fileName = $fileName;
        $this->loadDb();
        $this->saveDb();
    }

    public function get(string $emailAddress): ?User
    {
        $this->loadDb();

        $user = current(array_filter($this->database, function (User $user) use ($emailAddress) {
            return $user->getEmailAddress() === $emailAddress;
        }));

        return $user ?: null;
    }

    public function store(User $user): void
    {
        $this->database[] = $user;
        $this->saveDb();
    }

    protected function loadDb()
    {
        $this->database = unserialize(@file_get_contents($this->fileName), ['allowed_classes' => [User::class]]) ?: [];
    }

    protected function saveDb()
    {
        file_put_contents($this->fileName, serialize($this->database));
    }
}
