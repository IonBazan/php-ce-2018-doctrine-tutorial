<?php

namespace Application;

use Authentication\Value\EmailAddress;
use Authentication\Value\Password;
use Infrastructure\Authentication\Repository\JsonFileUsers;

require_once __DIR__ . '/../vendor/autoload.php';

$existingUsers = new JsonFileUsers(__DIR__ . '/../data/users.json');

$email = EmailAddress::fromString($_POST['emailAddress']);
$password = Password::fromString($_POST['password']);

if (! $existingUsers->isRegistered($email)) {
    echo 'Nope';

    return;
}

$user = $existingUsers->get($email);

if (!$password->verify($user->passwordHash)) {
    echo 'Nope';

    return;
}

echo 'OK';
