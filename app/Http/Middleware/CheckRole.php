<?php

namespace App\Http\Middleware;

use App\Models\Setings;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
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
        $user = Auth::user();
        $setting = Setings::where('key', 'role_admin')->first();
        $value_setting = explode(',', $setting->value);
        for ($i = 0; $i < count($value_setting); $i++) {
            if ($user->role == $value_setting[$i]) {
                // return redirect(route('a'));
                return $next($request);
            }
        }
        // return $next($request);
        return redirect('/');
    }
}
