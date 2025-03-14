<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Dev User',
            'email' => 'dev@gmail.com',
            'password' => Hash::make('1')
        ]);

        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $user->assignRole($adminRole);

        $permissions = [
            'access_admin',
            'user_read',
            'user_create',
            'user_update',
            'user_delete',
            'lead_create',
            'lead_read',
            'lead_update',
            'lead_delete',
            'permission_read',
            'permission_delete',
            'permission_update',
            'permission_view',
            'permission_create',
            'role_read',
            'role_delete',
            'role_update',
            'role_view',
            'role_create',
            'typeenterprise_read',
            'typeenterprise_view',
            'typeenterprise_update',
            'typeenterprise_delete',
            'typeenterprise_create',
            'branch_read',
            'branch_view',
            'branch_delete',
            'branch_update',
            'business_read',
            'business_update',
            'business_view',
            'business_delete'
        ];

        // Verificar se as permissões já existem, caso contrário, criar
        foreach ($permissions as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $adminRole->givePermissionTo($perm); // Associar permissão ao papel Admin
        }
    }
}
