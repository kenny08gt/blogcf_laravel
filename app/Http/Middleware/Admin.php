<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
class Admin
{
    protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(Guard $auth) {
        $this->auth=$auth;
    }
     
    public function handle($request, Closure $next)
    {
//        dd('hola desde middleware admin');
        //dd($this->auth->user()->admin());
        if($this->auth->user()->admin()){
            return $next($request);      
        }else{
            abort(401);
        }
    }
}
