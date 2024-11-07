<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CriticaPreguntum
 * 
 * @property int $id_critica_pregunta
 * @property int $id_critica
 * @property int $id_pregunta
 * @property float $calificacion_pregunta
 * 
 * @property Critica $critica
 * @property PreguntaCuestionario $pregunta_cuestionario
 *
 * @package App\Models
 */
class CriticaPreguntum extends Model
{
	protected $table = 'critica_pregunta';
	protected $primaryKey = 'id_critica_pregunta';
	public $timestamps = false;

	protected $casts = [
		'id_critica' => 'int',
		'id_pregunta' => 'int',
		'calificacion_pregunta' => 'float'
	];

	protected $fillable = [
		'id_critica',
		'id_pregunta',
		'calificacion_pregunta'
	];

	public function critica()
	{
		return $this->belongsTo(Critica::class, 'id_critica');
	}

	public function pregunta_cuestionario()
	{
		return $this->belongsTo(PreguntaCuestionario::class, 'id_pregunta');
	}
}
