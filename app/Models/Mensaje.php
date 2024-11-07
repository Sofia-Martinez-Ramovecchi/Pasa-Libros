<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mensaje
 * 
 * @property int $id_mensaje
 * @property int $id_usuario_emisor
 * @property int $id_usuario_receptor
 * @property string $descripcion_mensaje
 * @property Carbon $fecha_envio
 * @property Carbon $fecha_lectura
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Mensaje extends Model
{
	protected $table = 'mensaje';
	protected $primaryKey = 'id_mensaje';
	public $timestamps = false;

	protected $casts = [
		'id_usuario_emisor' => 'int',
		'id_usuario_receptor' => 'int',
		'fecha_envio' => 'datetime',
		'fecha_lectura' => 'datetime'
	];

	protected $fillable = [
		'id_usuario_emisor',
		'id_usuario_receptor',
		'descripcion_mensaje',
		'fecha_envio',
		'fecha_lectura'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario_receptor');
	}
}
