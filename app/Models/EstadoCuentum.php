<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoCuentum
 * 
 * @property int $id_estado_cuenta
 * @property string $nombre_estado_cuenta
 * 
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class EstadoCuentum extends Model
{
	protected $table = 'estado_cuenta';
	protected $primaryKey = 'id_estado_cuenta';
	public $timestamps = false;

	protected $fillable = [
		'nombre_estado_cuenta'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_estado_cuenta');
	}
}
