<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * 
 * @property int $id_tag
 * @property string $nombre_tag
 * 
 * @property Collection|Libro[] $libros
 *
 * @package App\Models
 */
class Tag extends Model
{
	protected $table = 'tag';
	protected $primaryKey = 'id_tag';
	public $timestamps = false;

	protected $fillable = [
		'nombre_tag'
	];

	public function libros()
	{
		return $this->belongsToMany(Libro::class, 'libro_tag', 'id_tag', 'id_libro')
					->withPivot('id_libro_tag');
	}
}
