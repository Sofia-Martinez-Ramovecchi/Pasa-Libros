<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * 
 * @property int $id_permiso
 * @property string $descripcion_permiso
 * 
 * @property Collection|RolPermiso[] $rol_permisos
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permiso';
	protected $primaryKey = 'id_permiso';
	public $timestamps = false;

	protected $fillable = [
		'descripcion_permiso'
	];

	public function rol_permisos()
	{
		return $this->hasMany(RolPermiso::class, 'id_permiso');
	}
}
