<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Critica
 * 
 * @property int $id_critica
 * @property int $id_usuario
 * @property int $id_publicacion
 * @property float|null $calificacion_libro
 * @property string|null $descripcion_critica
 * 
 * @property Publicacion $publicacion
 * @property Usuario $usuario
 * @property Collection|CriticaPreguntum[] $critica_pregunta
 *
 * @package App\Models
 */
class Critica extends Model
{
	protected $table = 'critica';
	protected $primaryKey = 'id_critica';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_publicacion' => 'int',
		'calificacion_libro' => 'float'
	];

	protected $fillable = [
		'id_usuario',
		'id_publicacion',
		'calificacion_libro',
		'descripcion_critica'
	];

	public function publicacion()
	{
		return $this->belongsTo(Publicacion::class, 'id_publicacion');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function critica_pregunta()
	{
		return $this->hasMany(CriticaPreguntum::class, 'id_critica');
	}
}
