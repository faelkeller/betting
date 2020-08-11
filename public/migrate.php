<?php

$site_url = 'http://betting.rafaelkeller.com.br';

$laravel_dir =  '..';

require $laravel_dir . '/vendor/autoload.php';

$app = require_once $laravel_dir . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo 'Installing...<br>';

$kernel->call('migrate', ['--force' => true]);

echo 'Seeding...<br>';

$kernel->call('db:seed', ['--force' => true]);

// redirect
echo "<script>window.location = '$site_url'</script>";
