<?php

namespace Zeus\Validation\Rules;

use Zeus\Models\User;
use Respect\Validation\Rules\AbstractRule;

class UsernameInUse extends AbstractRule
{
    public function validate($input)
    {
        return User::where('username', $input)->count() === 0;
    }
}
