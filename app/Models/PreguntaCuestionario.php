<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PreguntaCuestionario
 * 
 * @property int $id_pregunta
 * @property string $descripcion_pregunta
 * 
 * @property Collection|CriticaPreguntum[] $critica_pregunta
 *
 * @package App\Models
 */
class PreguntaCuestionario extends Model
{
	protected $table = 'pregunta_cuestionario';
	protected $primaryKey = 'id_pregunta';
	public $timestamps = false;

	protected $fillable = [
		'descripcion_pregunta'
	];

	public function critica_pregunta()
	{
		return $this->hasMany(CriticaPreguntum::class, 'id_pregunta');
	}
}
