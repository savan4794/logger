<?php

namespace Logs\Logger\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Log;

class RouteLogMiddleware{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $url = parse_url($request->url());
        if(isset($url['path'])){
            $url = parse_url($url['path'], PHP_URL_PATH);
            $matches = [];
            preg_match('/\/v(\d+)\/(.+)/', $url, $matches);
            $data =  current($matches);
        } else {
            $data =$url['host'];
        }

        Log::info('Route Name - ' . $data);

        return $response;
    }
}
