<?php

namespace App\Http\Middleware;

use App\Exceptions\PermissaoUnauthorizedException;
use App\Models\Acao;
use App\Models\Rotina;
use Closure;
use Exception;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissaoRotinaAcaoMiddleware extends PermissionMiddleware
{

    public function handle($request, Closure $next, $permission, $guard = null)
    {

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);
        $orignalPermissions = $permissions;
        foreach ($permissions as $i => $perm) {
            list($sRotina, $sAcao) = explode('>', $perm);
            $rotina = Rotina::where('nome', trim($sRotina))->first();
            $acao = Acao::where('nome', trim($sAcao))->first();

            if (!($rotina && $acao)) {
           //     throw PermissaoUnauthorizedException::forPermissions($orignalPermissions);
            }

            //$permissions[$i] = "ra_{$rotina->id}_{$acao->id}";
        }

        try {
            return parent::handle($request, $next, $permissions, $guard);
        } catch (UnauthorizedException $e) {
            throw PermissaoUnauthorizedException::forPermissions($orignalPermissions);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /*
    public function handle($request, Closure $next, $permission, $guard = null)
    {
        if (app('auth')->guard($guard)->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if (app('auth')->guard($guard)->user()->can($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
    */
}
