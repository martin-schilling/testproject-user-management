<?php

declare(strict_types = 1);

namespace App\Model\Aggregate\User;

use App\Infrastructure\ValueObject\ValueObject;

class UserState implements ValueObject 
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

    public static function fromArray(array $data): ValueObject 
    {
        $instance = new self();
        $instance->userId = $data['userId'];
        $instance->gender = $data['gender'];
        $instance->firstName = $data['firstName'];
        $instance->lastName = $data['lastName'];
        $instance->username = $data['username'];
        $instance->password = $data['password'];
        $instance->activated = false;
        $instance->blocked = false;
        $instance->address = $data['address'] ?? null;
        return $instance;
    }

    public function toArray(): array 
    {
        return (array)$this;
    }
}
