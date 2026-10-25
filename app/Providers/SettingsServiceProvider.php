<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Settings;
use App\Models\Paystack;
use Illuminate\Database\QueryException;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            $settings = Settings::where('id', '1')->first();
            $paystack = Paystack::where('id', '1')->first();
        } catch (QueryException $e) {
            // Schema not migrated yet, which is the case while `artisan migrate`
            // runs on a fresh database. Boot anyway so the command can proceed.
            return;
        }

        if ($settings) {
            // Set configuration values at run time
            config([
                'captcha.secret' => $settings->capt_secret,
                'captcha.sitekey' => $settings->capt_sitekey,
                'services.google.client_id' => $settings->google_id,
                'services.google.client_secret' => $settings->google_secret,
                'services.google.redirect' => $settings->google_redirect,
                'mail.mailers.smtp.host' => $settings->smtp_host,
                'mail.mailers.smtp.port' => $settings->smtp_port,
                'mail.mailers.smtp.encryption' => $settings->smtp_encrypt,
                'mail.mailers.smtp.username' => $settings->smtp_user,
                'mail.mailers.smtp.password' => $settings->smtp_password,
                'mail.default' => $settings->mail_server,
                'app.timezone' => $settings->timezone,
                'app.name' => $settings->site_name,
                'app.url' => $settings->site_address,
            ]);
        }

        if ($paystack) {
            config([
                'paystack.publicKey' => $paystack->paystack_public_key,
                'paystack.secretKey' => $paystack->paystack_secret_key,
                'paystack.paymentUrl' => $paystack->paystack_url,
                'paystack.merchantEmail' => $paystack->paystack_email,
            ]);
        }
    }
}
