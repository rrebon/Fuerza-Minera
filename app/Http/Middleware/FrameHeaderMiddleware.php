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
    	
    	$IlluminateResponse = 'Illuminate\Http\Response';
    	$SymfonyResponse = 'Symfony\Component\HttpFoundation\Response';
    	$BinaryFileResponse = 'Symfony\Component\HttpFoundation\BinaryFileResponse';
    	
    	$headers = [  			
    			//este header lo agregue para poder embeber los video de youtube
    			'X-Frame-Options'=>'ALLOW FROM https://www.youtube.com'    			
    	];
    	
    	//verifico si es instancia de BinaryFileResponse porque esta clase no tiene
    	//metodo header() y se utiliza en la descarga de archivos con el metodo download()
    	
    	
    	
    	if(is_a($response, $IlluminateResponse)){
    		foreach ($headers as $key => $value) {
    			$response->header($key, $value);
    		}    		
    		//$response->header('X-Frame-Options', 'ALLOW FROM https://www.youtube.com');
    	}
    	
    	if(is_a($response, $SymfonyResponse)||is_a($response, $BinaryFileResponse)){
    		foreach ($headers as $key => $value) {
    			$response->headers->set($key, $value);
    		}
    	}
    	
    	/*
    	 * $response = $next($request);
			$IlluminateResponse = 'Illuminate\Http\Response';
			$SymfonyResopnse = 'Symfony\Component\HttpFoundation\Response';
			$headers = [
			    'Access-Control-Allow-Origin' => '*',
			    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, PATCH, DELETE',
			    'Access-Control-Allow-Headers' => 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Authorization , Access-Control-Request-Headers',
			];
			
			if($response instanceof $IlluminateResponse) {
			    foreach ($headers as $key => $value) {
			        $response->header($key, $value);
			    }
			    return $response;
			}
			
			if($response instanceof $SymfonyResopnse) {
			    foreach ($headers as $key => $value) {
			        $response->headers->set($key, $value);
			    }
			    return $response;
			}
			
			return $response;
    	 */

        return $response;
    }
}
