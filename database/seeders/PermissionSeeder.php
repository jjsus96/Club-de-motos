<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Administrator']);
        $role1 = Role::create(['name' => 'Socio']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'colaboradores.crear'])->assignRole($role);
        Permission::create(['name' => 'colaboradores.editar'])->assignRole($role);
        Permission::create(['name' => 'colaboradores.lista'])->assignRole($role);
        Permission::create(['name' => 'colaboradores.ver'])->assignRole($role);

        Permission::create(['name' => 'eventos.crear'])->assignRole($role);
        Permission::create(['name' => 'eventos.editar'])->assignRole($role);
        Permission::create(['name' => 'eventos.lista'])->assignRole($role);
        Permission::create(['name' => 'eventos.ver'])->assignRole($role);

        Permission::create(['name' => 'galerias.crear'])->assignRole($role);
        Permission::create(['name' => 'galerias.editar'])->assignRole($role);
        Permission::create(['name' => 'galerias.lista'])->assignRole($role);
        Permission::create(['name' => 'galerias.ver'])->assignRole($role);

        Permission::create(['name' => 'patrocinadores.crear'])->assignRole($role);
        Permission::create(['name' => 'patrocinadores.editar'])->assignRole($role);
        Permission::create(['name' => 'patrocinadores.lista'])->assignRole($role);
        Permission::create(['name' => 'patrocinadores.ver'])->assignRole($role);

        Permission::create(['name' => 'socios.crear'])->assignRole($role);
        Permission::create(['name' => 'socios.editar'])->assignRole($role);
        Permission::create(['name' => 'socios.lista'])->assignRole($role);
        Permission::create(['name' => 'socios.ver'])->assignRole($role);

        Permission::create(['name' => 'users.crear'])->assignRole($role);
        Permission::create(['name' => 'users.editar'])->assignRole($role);
        Permission::create(['name' => 'users.lista'])->assignRole($role);
        Permission::create(['name' => 'users.ver'])->assignRole($role);

        Permission::create(['name' => 'eventodetalles.crear'])->assignRole($role);
        Permission::create(['name' => 'eventodetalles.editar'])->assignRole($role);
        Permission::create(['name' => 'eventodetalles.lista'])->assignRole($role);
        Permission::create(['name' => 'eventodetalles.ver'])->assignRole($role);

    }
}
