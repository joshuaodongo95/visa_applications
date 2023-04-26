<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'user-list']);
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-edit']);
        Permission::create(['name' => 'user-delete']);

        Permission::create(['name' => 'role-list']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-edit']);
        Permission::create(['name' => 'role-delete']);

        Permission::create(['name' => 'permission-list']);
        Permission::create(['name' => 'permission-create']);
        Permission::create(['name' => 'permission-edit']);
        Permission::create(['name' => 'permission-delete']);

        Permission::create(['name' => 'application-list']);
        Permission::create(['name' => 'application-create']);
        Permission::create(['name' => 'application-edit']);
        Permission::create(['name' => 'application-delete']);

        Permission::create(['name' => 'agent-list']);
        Permission::create(['name' => 'agent-create']);
        Permission::create(['name' => 'agent-edit']);
        Permission::create(['name' => 'agent-delete']);

        Permission::create(['name' => 'fees-list']);
        Permission::create(['name' => 'fees-create']);
        Permission::create(['name' => 'fees-edit']);
        Permission::create(['name' => 'fees-delete']);

        Permission::create(['name' => 'profile-list']);
        Permission::create(['name' => 'profile-create']);



        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        
        $role1->givePermissionTo('application-create');
        $role1->givePermissionTo('profile-list');

        $role2 = Role::create(['name' => 'admin']);

        $role2->givePermissionTo('application-list');
        $role2->givePermissionTo('application-create');
        $role2->givePermissionTo('application-edit');
        $role2->givePermissionTo('application-delete');

        
        $role2->givePermissionTo('fees-list');
        $role2->givePermissionTo('fees-edit');

        $role2->givePermissionTo('agent-list');
        $role2->givePermissionTo('agent-create');
        $role2->givePermissionTo('agent-edit');
        $role2->givePermissionTo('fees-delete');
        
        $role2->givePermissionTo('user-list');
        $role2->givePermissionTo('user-create');
        $role2->givePermissionTo('user-edit');
        $role2->givePermissionTo('user-delete');

        
        $role2->givePermissionTo('permission-list');
        $role2->givePermissionTo('permission-create');
        $role2->givePermissionTo('permission-edit');
        $role2->givePermissionTo('permission-delete');
        
        $role2->givePermissionTo('role-list');
        $role2->givePermissionTo('role-create');
        $role2->givePermissionTo('role-edit');
        $role2->givePermissionTo('role-delete');

        $role2->givePermissionTo('profile-list');


        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'user', 
            'email' => 'user@test.com',
            'password' => bcrypt('user')
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin')
            
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@test.com',
            'password' => bcrypt('superadmin')
            
        ]);
        $user->assignRole($role3);
    }
}
