<?php

namespace App\Containers\AppSection\Role\Exceptions;

use Exception;

final class FailedToDeleteRole extends Exception
{
    public static function becauseCannotDeleteSystemRole(): self
    {
        return new self('Cannot delete the system role.');
    }
}
