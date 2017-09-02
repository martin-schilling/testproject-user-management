<?php

declare(strict_types = 1);

namespace App\Model\Aggregate\User;

use Prooph\Common\Messaging\Message;

final class UserFunction 
{
    public static function registerUser(Message $registerUser) 
    {
        yield $registerUser->payload();
    }

    public static function whenUserWasRegistered(Message $userWasRegistered) 
    {
        return UserState::fromArray($userWasRegistered->payload());
    }

    public static function activateUser(UserState $user, Message $activateUser) 
    {
        yield $activateUser->payload();
    }

    public static function whenUserWasActivated(UserState $user, Message $userWasActivated) 
    {
        $user->activated = true;
        return $user;
    }
}
