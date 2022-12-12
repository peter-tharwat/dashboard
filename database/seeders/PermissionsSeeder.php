<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use \App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_structure = Config::get('permission.roles_structure');
        $permissions_map = collect(config('permission.permissions_map'));
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        foreach($roles_structure as $role_name => $role_value){
            $this->command->info('Creating Role '. strtoupper($role_name));
            $role = Role::firstOrCreate(['name' => $role_name,'display_name'=>$role_name]);
            foreach($role_value as $module => $permission_content){
                foreach (explode(',', $permission_content) as $p => $perm) {
                    $this->command->info('Adding Permission '. $module.'-'.$permissions_map[$perm] .' For Module '.$module);

                    $permission = Permission::firstOrCreate(['name' => $module.'-'.$permissions_map[$perm],'table'=>$module]);
                    $role->givePermissionTo($permission);
                }
            }

        }
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return  void
     */
    public function truncateLaratrustTables()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        Schema::disableForeignKeyConstraints();

        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();

        Schema::enableForeignKeyConstraints();
    }
}
