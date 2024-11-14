<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Localidad
 * 
 * @property int $id_localidad
 * @property int $id_provincia
 * @property string $nombre_localidad
 * 
 * @property Provincium $provincium
 * @property Collection|Publicacion[] $publicacions
 *
 * @package App\Models
 */
class Localidad extends Model
{
	protected $table = 'localidad';
	protected $primaryKey = 'id_localidad';
	public $timestamps = false;

	protected $casts = [
		'id_provincia' => 'int'
	];

	protected $fillable = [
		'id_provincia',
		'nombre_localidad'
	];

	public function provincium()
	{
		return $this->belongsTo(Provincium::class, 'id_provincia');
	}

	public function publicacions()
	{
		return $this->hasMany(Publicacion::class, 'id_localidad');
	}
}
