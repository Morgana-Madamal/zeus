<?php

namespace Zeus\Validation\Rules;

use Zeus\Models\User;
use Respect\Validation\Rules\AbstractRule;

class EmailInUse extends AbstractRule
{
    public function validate($input)
    {
        return User::where('email', $input)->count() === 0;
    }
}