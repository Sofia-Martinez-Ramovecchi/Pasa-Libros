<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LibroIntercambio
 * 
 * @property int $id_libro_intercambio
 * @property int $id_libro_propietario
 * @property int $id_libro_ofertante
 * @property int $id_solicitud
 * 
 * @property Libro $libro
 * @property SolicitudIntercambio $solicitud_intercambio
 *
 * @package App\Models
 */
class LibroIntercambio extends Model
{
	protected $table = 'libro_intercambio';
	protected $primaryKey = 'id_libro_intercambio';
	public $timestamps = false;

	protected $casts = [
		'id_libro_propietario' => 'int',
		'id_libro_ofertante' => 'int',
		'id_solicitud' => 'int'
	];

	protected $fillable = [
		'id_libro_propietario',
		'id_libro_ofertante',
		'id_solicitud'
	];

	public function libro()
	{
		return $this->belongsTo(Libro::class, 'id_libro_propietario');
	}

	public function solicitud_intercambio()
	{
		return $this->belongsTo(SolicitudIntercambio::class, 'id_solicitud');
	}
}
