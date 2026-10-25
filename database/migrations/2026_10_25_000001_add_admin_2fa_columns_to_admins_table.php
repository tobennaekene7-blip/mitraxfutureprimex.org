<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdmin2faColumnsToAdminsTable extends Migration
{
    /**
     * Add the 2FA columns that the admin login / two-factor
     * controllers expect but the original migration omitted.
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            if (!Schema::hasColumn('admins', 'enable_2fa')) {
                $table->string('enable_2fa')->nullable();
            }
            if (!Schema::hasColumn('admins', 'token_2fa')) {
                $table->string('token_2fa')->nullable();
            }
            if (!Schema::hasColumn('admins', 'pass_2fa')) {
                $table->string('pass_2fa')->nullable();
            }
            if (!Schema::hasColumn('admins', 'token_2fa_expiry')) {
                $table->timestamp('token_2fa_expiry')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $columns = ['enable_2fa', 'token_2fa', 'pass_2fa', 'token_2fa_expiry'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('admins', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}