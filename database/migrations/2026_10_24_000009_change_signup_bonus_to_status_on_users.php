<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeSignupBonusToStatusOnUsers extends Migration
{
    /**
     * users.signup_bonus is used as a status flag ("received"), not an amount,
     * so an integer column rejects the update the dashboard performs.
     */
    public function up()
    {
        // doctrine/dbal is not installed, so Blueprint::change() is unavailable.
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE `users` MODIFY `signup_bonus` VARCHAR(255) NULL');
        } else {
            Schema::table('users', function (Blueprint $table) {
                $table->string('signup_bonus')->nullable()->change();
            });
        }
    }

    public function down()
    {
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE `users` MODIFY `signup_bonus` INT NULL');
        } else {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('signup_bonus')->nullable()->change();
            });
        }
    }
}
