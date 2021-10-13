<?php

namespace App\Exceptions;

use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissaoUnauthorizedException extends UnauthorizedException
{

    public static function forPermissions(array $permissions): UnauthorizedException
    {
        $message = 'O usuário não possui permissão.';

        if (config('permission.display_permission_in_exception')) {
            $permStr = '['. implode('], [', $permissions) .']';

            $message = 'O usuário não possui permissão. As permissões nesessárias são: '.$permStr;
        }

        $exception = new static(403, $message, null, []);
        $exception->requiredPermissions = $permissions;

        return $exception;
    }

}
