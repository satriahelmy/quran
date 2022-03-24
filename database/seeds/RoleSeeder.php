<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = Role::create([
        	"name"=> 'admin',
        	"guard_name" => 'web'
        ]);

        $akuntansi = Role::create([
        	"name"=> 'akuntansi',
        	"guard_name" => 'web'
        ]);

        $msb = Role::create([
        	"name"=> 'msb',
        	"guard_name" => 'web'
        ]);

        $management = Role::create([
        	"name"=> 'management',
        	"guard_name" => 'web'
        ]);

        $manbag_up3 = Role::create([
            "name"=> 'manbag_up3',
            "guard_name" => 'web'
        ]);
    }
}
