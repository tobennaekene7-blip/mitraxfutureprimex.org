<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePaystacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('paystacks')) {
            Schema::create('paystacks', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('paystack_public_key')->nullable();
                $table->string('paystack_secret_key')->nullable();
                $table->string('paystack_url')->nullable();
                $table->string('paystack_email')->nullable();
                $table->timestamps();
            });
        }

        // SettingsServiceProvider reads row 1 on every boot.
        if (! DB::table('paystacks')->where('id', '1')->exists()) {
            DB::table('paystacks')->insert([
                'id' => 1,
                'paystack_url' => 'https://api.paystack.co',
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
        Schema::dropIfExists('paystacks');
    }
}
