<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;


class Roles
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
   public function handle($request, Closure $next, ... $roles) {

        if (!Auth::check()){
            dd("non autenticato");
        }
        //return redirect('login');

        $user = Auth::user();

        dd($user->role);

    }

}