<?php

namespace App\Http\Middleware;

use Closure;
use Landlord;
use App\Tenant;

class TenancyContract
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $domain = $request->getHttpHost();
        $tenant = Tenant::byDomain($domain);

        if ($tenant) {
            Landlord::addTenant($tenant);
            return $next($request);
        } else {
            abort(404, 'Sorry we could not find a platform for this domain');
        }
    }
}
