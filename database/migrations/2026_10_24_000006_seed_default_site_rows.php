<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedDefaultSiteRows extends Migration
{
    /**
     * The settings and terms_privacies rows are read unconditionally on every
     * request, so a freshly migrated database needs them to render a page.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('settings') && ! DB::table('settings')->where('id', '1')->exists()) {
            DB::table('settings')->insert([
                'id' => 1,
                'site_name' => config('app.name'),
                'site_title' => config('app.name'),
                'site_address' => config('app.url'),
                'timezone' => config('app.timezone'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (Schema::hasTable('terms_privacies') && ! DB::table('terms_privacies')->where('id', '1')->exists()) {
            DB::table('terms_privacies')->insert([
                'id' => 1,
                'description' => '',
                'useterms' => 'yes',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
