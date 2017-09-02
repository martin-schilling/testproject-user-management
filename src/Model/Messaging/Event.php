<?php

declare(strict_types = 1);

namespace App\Model\Messaging;

final class Event 
{
    const USER_WAS_REGISTERED = 'UserWasRegistered';
    const USER_WAS_ACTIVATED = 'UserWasActivated';
    
    public static function getEvents() 
    {
        $ref = new \ReflectionClass(__CLASS__);
        return $ref->getConstants();
    }

    private function __construct() {  }
}
