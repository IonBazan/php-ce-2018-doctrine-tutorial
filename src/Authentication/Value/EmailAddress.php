<?php

namespace Authentication\Value;

use Infrastructure\Authentication\Validator\EmailValidator;

final class EmailAddress
{
    /**
     * @var string
     */
    private $value;

    private function __construct()
    {
    }

    public static function fromString(string $value): self
    {
        if (!EmailValidator::isValid($value)) {
            throw new \InvalidArgumentException('Email is not valid');
        }

        $email = new static();
        $email->value = $value;

        return $email;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
