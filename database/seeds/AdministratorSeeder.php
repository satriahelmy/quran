<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "admin@coco.com";
        $administrator->password = \Hash::make("beraksi123");
        $administrator->nip = "93161423ZY";
        $administrator->role = "admin";
        $administrator->business_area = "1000";

        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}
