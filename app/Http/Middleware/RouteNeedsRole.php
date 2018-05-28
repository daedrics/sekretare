<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class RouteNeedsRole.
 */
class RouteNeedsRole
{
    /**
     * @param $request
     * @param Closure $next
     * @param $role
     * @param bool $needsAll
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        /**
         * Single role.
         */
        $access = auth()->user()->hasRole($role);


        if (!$access) {
            return redirect()
                ->back()
                ->withFlashDanger(trans('auth.general_error'));
        }

        return $next($request);
    }
}
