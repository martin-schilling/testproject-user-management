<?php

declare(strict_types = 1);

namespace App\Model\Aggregate\User;

use App\Infrastructure\ValueObject\AbstractValueObject;

class UserState extends AbstractValueObject 
{
    public $userId;
    public $gender;
    public $firstName;
    public $lastName;
    public $username;
    public $password;
    public $activated;
    public $blocked;
    public $address;

    public static function fromArray(array $data): AbstractValueObject 
    {
        $instance = parent::fromArray($data);
        $instance->activated = false;
        $instance->blocked = false;
        $instance->address = $instance->address ?? null;
        return $instance;
    }
}
