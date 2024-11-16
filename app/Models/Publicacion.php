<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Publicacion
 * 
 * @property int $id_publicacion
 * @property int $id_estado_publicacion
 * @property int $id_libro
 * @property int $id_localidad
 * @property Carbon $fecha_creacion
 * @property string|null $descripcion_publicacion
 * 
 * @property EstadoPublicacion $estado_publicacion
 * @property Libro $libro
 * @property Localidad $localidad
 * @property Collection|Critica[] $criticas
 * @property Collection|Reporte[] $reportes
 *
 * @package App\Models
 */
class Publicacion extends Model
{
	protected $table = 'publicacion';
	protected $primaryKey = 'id_publicacion';
	public $timestamps = false;

	protected $casts = [
		'id_estado_publicacion' => 'int',
		'id_libro' => 'int',
		'id_localidad' => 'int',
		'fecha_creacion' => 'datetime'
	];

	protected $fillable = [
		'id_estado_publicacion',
		'id_libro',
		'id_localidad',
		'fecha_creacion',
		'descripcion_publicacion'
	];

	public function estado_publicacion()
	{
		return $this->belongsTo(EstadoPublicacion::class, 'id_estado_publicacion');
	}

	public function libro()
	{
		return $this->belongsTo(Libro::class, 'id_libro');
	}

	public function localidad()
	{
		return $this->belongsTo(Localidad::class, 'id_localidad');
	}

	public function criticas()
	{
		return $this->hasMany(Critica::class, 'id_publicacion');
	}

	public function reportes()
	{
		return $this->belongsToMany(Reporte::class, 'publicacion_reporte', 'id_publicacion', 'id_reporte')
					->withPivot('id_publicacion_reporte', 'id_usuario', 'comentario_reporte', 'fecha_creacion');
	}
}
