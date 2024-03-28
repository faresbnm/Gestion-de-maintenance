<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\userData;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Str;




class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = $request->session()->get('activeSession');
        $userData = userData::find($userId);

        if(!session()->has('activeSession') && ($request->path() !='/')){
            return redirect('/');
        }

        if(session()->has('activeSession') && ($request->path() == '/') ){
            return back();
        }
        if ($request->session()->has('activeSession')) {
            $userId = $request->session()->get('activeSession');
            $userData = userData::find($userId);
    
            if ($userData->UserRole === 'student' && Str::startsWith($request->path(), 'admin/')) {
                return back()->with('error', 'Unauthorized access.');
            }
            elseif($userData->UserRole === 'pilote' && $request->path() == 'admin/pilote'){
                return back()->with('error', 'Unauthorized access.');
            }
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}

