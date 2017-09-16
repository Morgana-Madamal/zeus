<?php

namespace Zeus\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class UsernameInUseException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Username is already in use.',
        ],
    ];
}