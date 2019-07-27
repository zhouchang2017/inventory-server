<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->truncate();

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'publish product']);
        Permission::create(['name' => 'unpublish product']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'basic']);
        $role->givePermissionTo('edit product');

        // or may be done by chaining
        $role = Role::create(['name' => 'shop manager'])
            ->givePermissionTo(['publish product', 'unpublish product']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());


        factory(\App\User::class)->create()->each(function ($user)use($role) {
//            $role = \Spatie\Permission\Models\Role::create([ 'name' => 'admin' ]);
            $user->assignRole($role);
        });


    }
}
