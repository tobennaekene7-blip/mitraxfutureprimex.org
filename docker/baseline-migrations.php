<?php

/**
 * Baseline the migrations table on databases whose schema was imported
 * without the matching `migrations` bookkeeping rows.
 *
 * On such a database `php artisan migrate` tries to re-create tables that
 * already exist and aborts on the first conflict, so every later migration
 * (for example `add_l_name_to_users_table`) is silently skipped.
 *
 * Legacy migrations below BASELINE_CUTOFF are marked as already applied.
 * Anything at or above the cutoff is left alone so `migrate` still runs it,
 * which keeps this safe to execute on every container boot.
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

const BASELINE_CUTOFF = '2026_10_24_000002';

require __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

if (!Schema::hasTable('migrations')) {
    exit(0);
}

$applied = DB::table('migrations')->pluck('migration')->all();

$rows = [];
foreach (glob(__DIR__.'/../database/migrations/*_*.php') as $file) {
    $name = basename($file, '.php');

    if ($name >= BASELINE_CUTOFF || in_array($name, $applied, true)) {
        continue;
    }

    $rows[] = ['migration' => $name, 'batch' => 1];
}

if ($rows) {
    DB::table('migrations')->insert($rows);
    echo 'Baselined '.count($rows)." legacy migrations.\n";
}
