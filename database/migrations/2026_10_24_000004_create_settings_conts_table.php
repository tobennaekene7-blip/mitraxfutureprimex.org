<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsContsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('settings_conts')) {
            Schema::create('settings_conts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->decimal('fee', 8, 2)->default(0);
                $table->string('status')->nullable();
                $table->string('success')->nullable();
                $table->string('use_crypto_feature')->default('false');
                $table->timestamps();
            });
        }

        // AppServiceProvider and the exchange views read row 1 on every request.
        if (! DB::table('settings_conts')->where('id', '1')->exists()) {
            DB::table('settings_conts')->insert([
                'id' => 1,
                'fee' => 0,
                'status' => '1',
                'use_crypto_feature' => 'false',
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
        Schema::dropIfExists('settings_conts');
    }
}
