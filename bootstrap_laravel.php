<?php

require __DIR__.'/laravel/vendor/autoload.php';

$app = require_once __DIR__.'/laravel/bootstrap/app.php';

$request = Illuminate\Http\Request::capture();
$app->instance('request', $request);
Illuminate\Support\Facades\Facade::clearResolvedInstance('request');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

// below you could set global configuration values, etc.
config(['global_configuration_value' => 'value']);
