<?php

declare(strict_types = 1);

namespace App\Model\Messaging;

final class Command 
{
    const REGISTER_USER = 'RegisterUser';
    const ACTIVATE_USER = 'ActivateUser';

    private function __construct() {  }
}
