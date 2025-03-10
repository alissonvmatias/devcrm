<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Criar o usuário dev
        $user = User::create([
            'name' => 'Dev User',
            'email' => 'dev@gmail.com',
            'password' => bcrypt('1'), // Senha dev
        ]);

        // Adicionar a role Admin ao usuário
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $user->assignRole($adminRole);

        // Adicionar as permissões
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
        ];

        // Verificar se as permissões já existem, caso contrário, criar
        foreach ($permissions as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $adminRole->givePermissionTo($perm); // Associar permissão ao papel Admin
        }
    }
}
