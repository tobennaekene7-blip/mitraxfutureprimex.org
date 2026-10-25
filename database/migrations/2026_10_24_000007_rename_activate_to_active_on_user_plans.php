<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RenameActivateToActiveOnUserPlans extends Migration
{
    /**
     * user_plans was created with a misspelled "activate" column, but every
     * read and write in the app (plan purchase, cron top-ups, deposit
     * confirmation) uses "active".
     */
    public function up()
    {
        $this->renameColumn('activate', 'active');
    }

    public function down()
    {
        $this->renameColumn('active', 'activate');
    }

    // doctrine/dbal is not installed, so Schema::renameColumn() is unavailable.
    private function renameColumn($from, $to)
    {
        if (!Schema::hasColumn('user_plans', $from) || Schema::hasColumn('user_plans', $to)) {
            return;
        }

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE `user_plans` CHANGE `{$from}` `{$to}` VARCHAR(255) NULL");
        } else {
            Schema::table('user_plans', function (Blueprint $table) use ($from, $to) {
                $table->renameColumn($from, $to);
            });
        }
    }
}
