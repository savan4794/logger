# logger

composer require voip-logger/logger

then in App\Http Directory
Kernel.php

paste the below code

'route.log'=>\Logger\Logger\Http\Middleware\RouteLogMiddleware::class


in your use middleware as route.log
