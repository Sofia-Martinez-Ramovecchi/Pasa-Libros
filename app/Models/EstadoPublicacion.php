<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoPublicacion
 * 
 * @property int $id_estado_publicacion
 * @property string $nombre_estado_publicacion
 * 
 * @property Collection|Publicacion[] $publicacions
 *
 * @package App\Models
 */
class EstadoPublicacion extends Model
{
	protected $table = 'estado_publicacion';
	protected $primaryKey = 'id_estado_publicacion';
	public $timestamps = false;

	protected $fillable = [
		'nombre_estado_publicacion'
	];

	public function publicacions()
	{
		return $this->hasMany(Publicacion::class, 'id_estado_publicacion');
	}
}
