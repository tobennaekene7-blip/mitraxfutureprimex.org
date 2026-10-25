<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Ensure the primary admin account exists with the configured
     * credentials. Idempotent: creates it when missing and refreshes
     * the password/status so a broken row is recovered on next boot.
     *
     * Credentials come from env vars (ADMIN_EMAIL / ADMIN_PASSWORD)
     * and default to the credentials used for this deployment.
     */
    public function run()
    {
        $email = env('ADMIN_EMAIL', 'admin@mitraxfutureprimex.org');
        $password = env('ADMIN_PASSWORD', 'Mfp-P86wB7xtbc8S');

        $admin = Admin::where('email', $email)->first();

        if ($admin) {
            $admin->password = Hash::make($password);
            $admin->status = 'active';
            $admin->acnt_type_active = 'active';
            $admin->save();

            return;
        }

        $admin = new Admin();
        $admin->firstName = 'Super';
        $admin->lastName = 'Admin';
        $admin->email = $email;
        $admin->password = Hash::make($password);
        $admin->phone = null;
        $admin->dashboard_style = 'dark';
        $admin->acnt_type_active = 'active';
        $admin->status = 'active';
        $admin->type = 'Super Admin';
        $admin->enable_2fa = 'no';
        $admin->save();
    }
}