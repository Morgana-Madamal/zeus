<?php

namespace Zeus\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class EmailInUseException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Email is already in use.',
        ],
    ];
}
