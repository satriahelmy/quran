<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssignPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::findByName('admin');
        $akuntansi = Role::findByName('akuntansi');
        $msb = Role::findByName('msb');
        $management = Role::findByName('management');
        $manbag_up3 = Role::findByName('manbag_up3');

        $admin->syncPermissions([
        	'view-dashboard',
        	'view-bpp-unit',
        	'view-bpp-periode',
        	'cost-review-ga',
        	'cost-review-account',
        	'export-account',
        	'export-general-ledger',
        	'view-komitmen',
        	'view-mcar-unit',
        	'view-mcar-periode',
        	'upload-target',
        	'upload-kwhjual',
        	'upload-psa',
        	'upload-transaksi',
        	'master-unit',
        	'master-user',
        	'master-ga',
        	'master-account'
        ]);

        $akuntansi->syncPermissions([
        	'view-dashboard',
        	'view-bpp-unit',
        	'view-bpp-periode',
        	'cost-review-ga',
        	'cost-review-account',
        	'export-account',
        	'export-general-ledger',
        	'view-komitmen',
        	'view-mcar-unit',
        	'view-mcar-periode',
        	'upload-target',
        	'upload-kwhjual',
        	'upload-psa',
        	'upload-transaksi',
        	'master-unit',
        	'master-user',
        	'master-ga',
        	'master-account'
        ]);

        $msb->syncPermissions([
        	'view-dashboard',
        	'view-bpp-unit',
        	'view-bpp-periode',
        	'cost-review-ga',
        	'cost-review-account',
        	'export-account',
        	'export-general-ledger',
        	'view-komitmen',
        	'view-mcar-unit',
        	'view-mcar-periode',
        ]);

        $management->syncPermissions([
        	'view-dashboard',
        	'view-bpp-unit',
        	'view-bpp-periode',
        	'cost-review-ga',
        	'cost-review-account',
        	'export-account',
        	'export-general-ledger',
        	'view-komitmen',
        	'view-mcar-unit',
        	'view-mcar-periode',
        ]);

        $admin->syncPermissions([
        	'view-dashboard',
        	'view-bpp-unit',
        	'view-bpp-periode',
        	'cost-review-ga',
        	'cost-review-account',
        	'export-account',
        	'export-general-ledger',
        ]);

    }
}
