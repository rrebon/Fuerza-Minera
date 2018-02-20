<?php

namespace App\Http\Middleware;

use Closure;

class FrameHeaderMiddleware
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
    	$response = $next($request);
    	
    	//verifico si es instancia de BinaryFileResponse porque esta clase no tiene
    	//metodo header() y se utiliza en la descarga de archivos con el metodo download()
    	if(!is_a($response, 'Symfony\Component\HttpFoundation\BinaryFileResponse')){
    		//este header lo agregue para poder embeber los video de youtube
    		$response->header('X-Frame-Options', 'ALLOW FROM https://www.youtube.com');
    	}

        return $response;
    }
}
