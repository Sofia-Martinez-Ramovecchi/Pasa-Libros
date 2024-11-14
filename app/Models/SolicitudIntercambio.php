<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SolicitudIntercambio
 * 
 * @property int $id_solicitud
 * @property int $id_usuario_ofertante
 * @property int $id_estado_solicitud
 * @property string|null $descripcion_solicitud
 * @property int $cant_libros
 * @property Carbon $fecha_creacion
 * 
 * @property EstadoSolicitud $estado_solicitud
 * @property Usuario $usuario
 * @property Collection|LibroIntercambio[] $libro_intercambios
 *
 * @package App\Models
 */
class SolicitudIntercambio extends Model
{
	protected $table = 'solicitud_intercambio';
	protected $primaryKey = 'id_solicitud';
	public $timestamps = false;

	protected $casts = [
		'id_usuario_ofertante' => 'int',
		'id_estado_solicitud' => 'int',
		'cant_libros' => 'int',
		'fecha_creacion' => 'datetime'
	];

	protected $fillable = [
		'id_usuario_ofertante',
		'id_estado_solicitud',
		'descripcion_solicitud',
		'cant_libros',
		'fecha_creacion'
	];

	public function estado_solicitud()
	{
		return $this->belongsTo(EstadoSolicitud::class, 'id_estado_solicitud');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario_ofertante');
	}

	public function libro_intercambios()
	{
		return $this->hasMany(LibroIntercambio::class, 'id_solicitud');
	}
}
