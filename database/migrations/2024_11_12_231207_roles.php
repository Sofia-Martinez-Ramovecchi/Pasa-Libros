<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
/**
* Run the migrations.
*/
public function up(): void
{
$role = Role::create(['name' => 'usuarioRoles']);

$permissions = [
'eliminar publicacion',
'editar publicacion',
'publicar publicacion',
'editar perfil'
];

foreach ($permissions as $permissionName) {
$permission = Permission::firstOrCreate(['name' => $permissionName]);
$role->givePermissionTo($permission);
$permission->assignRole($role);
}
}

/**
* Reverse the migrations.
*/
public function down(): void
{
// Aquí puedes agregar lógica para revertir los cambios si es necesario
}
};
