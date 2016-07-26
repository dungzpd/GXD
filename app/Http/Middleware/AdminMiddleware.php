<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware {

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role) {                
        if(!$request->user()) {
            return redirect()->guest('admin/login');
        }
        
        $currentRole = $request->user()->role->name;
        $roles = explode('/', $role);
        if(!in_array($currentRole, $roles)) {            
            return redirect()->guest('login');
        }
        
        
        return $next($request);
    }

}
