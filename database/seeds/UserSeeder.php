<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->username = "admin";
        $admin->name = "Site Administrator";
        $admin->email = "admin@cocococo.com";
        $admin->password = \Hash::make("beraksi123");
        $admin->nip = "93161423ZY";
        $admin->save();

        $admin->assignRole('admin');
    }
}
