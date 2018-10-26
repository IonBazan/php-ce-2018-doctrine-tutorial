<?php

namespace Authentication\Notification;

use Authentication\Entity\User;

class UserCreatedNotification
{
    public static function notify(User $user)
    {
        echo sprintf('Hello, %s!<br/>', $user->getEmailAddress());
        echo '<span style="color:green;">You have been successfully registered!</span>';
    }
}
