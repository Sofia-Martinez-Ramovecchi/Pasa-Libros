<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PublicacionReporte
 * 
 * @property int $id_publicacion_reporte
 * @property int $id_reporte
 * @property int $id_usuario
 * @property int $id_publicacion
 * @property string|null $comentario_reporte
 * @property Carbon $fecha_creacion
 * 
 * @property Publicacion $publicacion
 * @property Reporte $reporte
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class PublicacionReporte extends Model
{
	protected $table = 'publicacion_reporte';
	protected $primaryKey = 'id_publicacion_reporte';
	public $timestamps = false;

	protected $casts = [
		'id_reporte' => 'int',
		'id_usuario' => 'int',
		'id_publicacion' => 'int',
		'fecha_creacion' => 'datetime'
	];

	protected $fillable = [
		'id_reporte',
		'id_usuario',
		'id_publicacion',
		'comentario_reporte',
		'fecha_creacion'
	];

	public function publicacion()
	{
		return $this->belongsTo(Publicacion::class, 'id_publicacion');
	}

	public function reporte()
	{
		return $this->belongsTo(Reporte::class, 'id_reporte');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
