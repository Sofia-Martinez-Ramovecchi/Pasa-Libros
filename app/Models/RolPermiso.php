<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolPermiso
 * 
 * @property int $id_rol_permiso
 * @property int $id_rol
 * @property int $id_permiso
 * 
 * @property Permiso $permiso
 * @property RolUsuario $rol_usuario
 *
 * @package App\Models
 */
class RolPermiso extends Model
{
	protected $table = 'rol_permiso';
	protected $primaryKey = 'id_rol_permiso';
	public $timestamps = false;

	protected $casts = [
		'id_rol' => 'int',
		'id_permiso' => 'int'
	];

	protected $fillable = [
		'id_rol',
		'id_permiso'
	];

	public function permiso()
	{
		return $this->belongsTo(Permiso::class, 'id_permiso');
	}

	public function rol_usuario()
	{
		return $this->belongsTo(RolUsuario::class, 'id_rol');
	}
}
