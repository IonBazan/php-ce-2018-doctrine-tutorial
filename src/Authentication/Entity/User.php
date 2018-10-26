<?php

namespace Authentication\Entity;

class User
{
    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var string
     */
    protected $passwordHash;

    /**
     * @var bool
     */
    protected $disabled = false;

    /**
     * @var bool
     */
    protected $active = false;

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): User
    {
        $this->active = $active;

        return $this;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function setDisabled(bool $disabled): User
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): User
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(string $passwordHash): User
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }
}
