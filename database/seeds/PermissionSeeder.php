<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
        	'name' => 'view-dashboard',
        	'guard_name' => 'web'
        ]);

		Permission::create([
        	'name' => 'view-bpp-unit',
        	'guard_name' => 'web'
        ]);

		Permission::create([
        	'name' => 'view-bpp-periode',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'cost-review-ga',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'cost-review-account',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'export-account',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'view-komitmen',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'view-mcar-unit',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'view-mcar-periode',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'upload-target',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'upload-kwhjual',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'upload-psa',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'upload-transaksi',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'master-unit',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'master-user',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'master-ga',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'master-account',
        	'guard_name' => 'web'
        ]);

        Permission::create([
        	'name' => 'export-general-ledger',
        	'guard_name' => 'web'
        ]);
    }
}
