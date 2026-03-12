<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateBookYear
{

    public function handle($request, Closure $next)
    {

        $year = $request->route('year');

        if($year){

            if($year < 1900 || $year > date('Y')){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid book year'
                ], 400);
            }

        }

        return $next($request);

    }

}