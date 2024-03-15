<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class CheckAuth
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
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the user's roles
            $roles = Auth::user()->getRoleNames();

            // Redirect to respective dashboards based on roles
            switch ($roles[0]) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                case 'member':
                    return redirect()->route('member.dashboard');
                    break;
                case 'agent':
                    return redirect()->route('real_estate.dashboard');
                    break;
                case 'executive':
                    return redirect()->route('executive.dashboard');
                    break;
                default:
                    // If the user has no roles or unknown roles, redirect to login
                    return redirect()->route('login');
                    break;
            }
        }

        // If the user is not authenticated, proceed with the request
        return $next($request);
    }
}
