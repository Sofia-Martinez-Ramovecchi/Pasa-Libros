<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reporte
 * 
 * @property int $id_reporte
 * @property string $descripcion_reporte
 * 
 * @property Collection|Publicacion[] $publicacions
 *
 * @package App\Models
 */
class Reporte extends Model
{
	protected $table = 'reporte';
	protected $primaryKey = 'id_reporte';
	public $timestamps = false;

	protected $fillable = [
		'descripcion_reporte'
	];

	public function publicacions()
	{
		return $this->belongsToMany(Publicacion::class, 'publicacion_reporte', 'id_reporte', 'id_publicacion')
					->withPivot('id_publicacion_reporte', 'id_usuario', 'comentario_reporte', 'fecha_creacion');
	}
}
