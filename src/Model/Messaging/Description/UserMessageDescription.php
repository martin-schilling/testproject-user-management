<?php

declare(strict_types = 1);

namespace App\Model\Messaging\Description;

use Prooph\EventMachine\EventMachineDescription;
use Prooph\EventMachine\EventMachine;
use Prooph\EventMachine\JsonSchema\JsonSchema;
use App\Model\Messaging\Command;
use App\Model\Messaging\Event;

final class UserMessageDescription implements EventMachineDescription, UserPropertyConfig
{
    public static function describe(EventMachine $eventMachine): void 
    {
        self::describeRegisterUser($eventMachine);
        self::describeActivateUser($eventMachine);
    }

    private static function describeRegisterUser(EventMachine $eventMachine): void 
    {
        $registerUserConfig = JsonSchema::object(
            [
                'userId' => self::PROPERTY_CONFIG['userId'],
                'gender' => self::PROPERTY_CONFIG['gender'],
                'firstName' => self::PROPERTY_CONFIG['firstName'],
                'lastName' => self::PROPERTY_CONFIG['lastName'],
                'username' => self::PROPERTY_CONFIG['username'],
                'password' => self::PROPERTY_CONFIG['password']
            ], [
                'address' =>  self::PROPERTY_CONFIG['address']
            ]
        );

        $eventMachine->registerCommand(Command::REGISTER_USER, $registerUserConfig);
        $eventMachine->registerEvent(Event::USER_WAS_REGISTERED, $registerUserConfig);
    }

    private static function describeActivateUser(EventMachine $eventMachine): void 
    {
        $activateUserConfig = JsonSchema::object([
            'userId' => self::PROPERTY_CONFIG['userId']
        ]);

        $eventMachine->registerCommand(Command::ACTIVATE_USER, $activateUserConfig);
        $eventMachine->registerEvent(Event::USER_WAS_ACTIVATED, $activateUserConfig);
    }
}
