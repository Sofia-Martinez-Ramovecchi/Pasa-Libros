<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CondicionLibro
 * 
 * @property int $id_condicion_libro
 * @property string $nombre_condicion
 * 
 * @property Collection|Libro[] $libros
 *
 * @package App\Models
 */
class CondicionLibro extends Model
{
	protected $table = 'condicion_libro';
	protected $primaryKey = 'id_condicion_libro';
	public $timestamps = false;

	protected $fillable = [
		'nombre_condicion'
	];

	public function libros()
	{
		return $this->hasMany(Libro::class, 'id_condicion_libro');
	}
}
