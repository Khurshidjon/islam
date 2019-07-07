<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'browse']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'add']);
        Permission::create(['name' => 'delete']);
    }
}
