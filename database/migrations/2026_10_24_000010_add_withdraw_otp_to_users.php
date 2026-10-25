<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWithdrawOtpToUsers extends Migration
{
    /**
     * WithdrawalController reads and writes users.withdrawotp for the
     * withdrawal OTP flow, but the column was never created.
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'withdrawotp')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('withdrawotp')->nullable();
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('users', 'withdrawotp')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('withdrawotp');
            });
        }
    }
}