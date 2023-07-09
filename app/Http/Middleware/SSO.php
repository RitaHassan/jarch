<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SSO
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session('logged_in')) {
            if ($request->ajax()) {
                return response()->json([], 401);
            } else {
                // $tenant = \Slides\Saml2\Models\Tenant::where('key', 'ssoidp')->first();
                $tenant = \App\Models\Tenant::get();
                $redirectTo = saml_url($request->fullUrl(), $tenant->UUID);

                return redirect($redirectTo);
            }
        }

        return $next($request);
    }
}
