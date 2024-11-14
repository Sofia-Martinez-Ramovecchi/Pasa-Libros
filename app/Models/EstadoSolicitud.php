<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoSolicitud
 * 
 * @property int $id_estado_solicitud
 * @property string $nombre_estado_solicitud
 * 
 * @property Collection|SolicitudIntercambio[] $solicitud_intercambios
 *
 * @package App\Models
 */
class EstadoSolicitud extends Model
{
	protected $table = 'estado_solicitud';
	protected $primaryKey = 'id_estado_solicitud';
	public $timestamps = false;

	protected $fillable = [
		'nombre_estado_solicitud'
	];

	public function solicitud_intercambios()
	{
		return $this->hasMany(SolicitudIntercambio::class, 'id_estado_solicitud');
	}
}
