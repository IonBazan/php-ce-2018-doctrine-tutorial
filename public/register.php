<?php

// registering a new user:

// 1. check if a user with the same email address exists
// 2. if not, create a user
// 3. hash the password
// 4. send the email to confirm activation (we will just display it)
// 5. save the user

// Tip: discuss - email or saving? Chicken-egg problem

require_once '../vendor/autoload.php';

use Authentication\CommandHandler\RegistrationHandler;
use Authentication\Command\RegisterCommand;

try {
    $registerCommand = new RegisterCommand($_POST['emailAddress'], $_POST['password']);
    RegistrationHandler::register($registerCommand);
} catch (Exception $e) {
    die(sprintf('<span style="color:red;">An error occurred: %s</span>', $e->getMessage()));
}
