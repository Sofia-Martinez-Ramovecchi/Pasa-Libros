<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RolUsuario
 * 
 * @property int $id_rol
 * @property string $nombre_rol
 * 
 * @property Collection|RolPermiso[] $rol_permisos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class RolUsuario extends Model
{
	protected $table = 'rol_usuario';
	protected $primaryKey = 'id_rol';
	public $timestamps = false;

	protected $fillable = [
		'nombre_rol'
	];

	public function rol_permisos()
	{
		return $this->hasMany(RolPermiso::class, 'id_rol');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_rol');
	}
}
