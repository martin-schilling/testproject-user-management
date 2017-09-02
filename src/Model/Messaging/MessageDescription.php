<?php

declare(strict_types = 1);

namespace App\Model\Messaging;

use Prooph\EventMachine\EventMachineDescription;
use Prooph\EventMachine\EventMachine;
use App\Model\Messaging\Description\UserMessageDescription;

final class MessageDescription implements EventMachineDescription 
{
    public static function describe(EventMachine $eventMachine): void 
    {
        UserMessageDescription::describe($eventMachine);
    }
}
