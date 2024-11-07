<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Libro
 * 
 * @property int $id_libro
 * @property int $id_usuario
 * @property int $id_condicion_libro
 * @property string $nombre_libro
 * @property string|null $autor_libro
 * @property string|null $editorial
 * @property Carbon|null $fecha_publicacion
 * @property string $imagen_portada
 * @property string|null $imagen_contraportada
 * @property string|null $ISBN
 * 
 * @property CondicionLibro $condicion_libro
 * @property Usuario $usuario
 * @property Collection|LibroIntercambio[] $libro_intercambios
 * @property Collection|Tag[] $tags
 * @property Collection|Publicacion[] $publicacions
 *
 * @package App\Models
 */
class Libro extends Model
{
	protected $table = 'libro';
	protected $primaryKey = 'id_libro';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_condicion_libro' => 'int',
		'fecha_publicacion' => 'datetime'
	];

	protected $fillable = [
		'id_usuario',
		'id_condicion_libro',
		'nombre_libro',
		'autor_libro',
		'editorial',
		'fecha_publicacion',
		'imagen_portada',
		'imagen_contraportada',
		'ISBN'
	];

	public function condicion_libro()
	{
		return $this->belongsTo(CondicionLibro::class, 'id_condicion_libro');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function libro_intercambios()
	{
		return $this->hasMany(LibroIntercambio::class, 'id_libro_propietario');
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class, 'libro_tag', 'id_libro', 'id_tag')
					->withPivot('id_libro_tag');
	}

	public function publicacions()
	{
		return $this->hasMany(Publicacion::class, 'id_libro');
	}
}
