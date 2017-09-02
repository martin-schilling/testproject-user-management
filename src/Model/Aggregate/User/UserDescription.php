<?php

declare(strict_types = 1);

namespace App\Model\Aggregate\User;

use Prooph\EventMachine\EventMachine;
use Prooph\EventMachine\EventMachineDescription;
use App\Model\Messaging\Command;
use App\Model\Messaging\Event;
use App\Model\Aggregate\Aggregate;

final class UserDescription implements EventMachineDescription 
{
    const IDENTIFIER = 'userId';

    public static function describe(EventMachine $eventMachine): void 
    {
        self::describeRegisterUser($eventMachine);
        self::describeActivateUser($eventMachine);
    }

    private static function describeRegisterUser(EventMachine $eventMachine): void 
    {
        $eventMachine->process(Command::REGISTER_USER)
            ->withNew(Aggregate::USER)
            ->identifiedBy(self::IDENTIFIER)
            ->handle([UserFunction::class, 'registerUser'])
            ->recordThat(Event::USER_WAS_REGISTERED)
            ->apply([UserFunction::class, 'whenUserWasRegistered']);
    }

    private static function describeActivateUser(EventMachine $eventMachine): void 
    {
        $eventMachine->process(Command::ACTIVATE_USER)
            ->withExisting(Aggregate::USER)
            ->handle([UserFunction::class, 'activateUser'])
            ->recordThat(Event::USER_WAS_ACTIVATED)
            ->apply([UserFunction::class, 'whenUserWasActivated']);
    }
}
