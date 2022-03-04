<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Peticion;

class Peticiones
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
       //dd($request);
       //obteniendo la ruta
        $ruta= $request->getPathInfo() ?? null;
        //insertando en la tabla peticiones
        Peticion::create(["ruta"=>$ruta]);

        return $next($request);
    }
}
