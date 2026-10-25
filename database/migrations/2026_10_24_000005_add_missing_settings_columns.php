<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingSettingsColumns extends Migration
{
    /**
     * Columns read by SettingsServiceProvider and written by AppSettingsController
     * that the original create_settings_table migration never declared.
     *
     * Lengths are deliberate: settings already holds 48 varchar(255) columns, which
     * is close to InnoDB's 65,535 byte row limit under utf8mb4.
     *
     * @var array
     */
    private $columns = [
        'timezone' => 64,
        's_currency' => 16,
        'mail_server' => 64,
        'emailfrom' => 191,
        'emailfromname' => 191,
        'smtp_host' => 191,
        'smtp_port' => 16,
        'smtp_encrypt' => 16,
        'smtp_user' => 191,
        'smtp_password' => 191,
        'capt_secret' => 191,
        'capt_sitekey' => 191,
        'google_id' => 191,
        'google_redirect' => 191,
        'enable_social_login' => 16,
        'deposit_option' => 64,
        'subscription_service' => 191,
        'google_secret' => 'text',
        'bot_link' => 'text',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->columns as $column => $definition) {
            if (Schema::hasColumn('settings', $column)) {
                continue;
            }

            Schema::table('settings', function (Blueprint $table) use ($column, $definition) {
                if ($definition === 'text') {
                    $table->text($column)->nullable();
                } else {
                    $table->string($column, $definition)->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach (array_keys($this->columns) as $column) {
            if (! Schema::hasColumn('settings', $column)) {
                continue;
            }

            Schema::table('settings', function (Blueprint $table) use ($column) {
                $table->dropColumn($column);
            });
        }
    }
}
