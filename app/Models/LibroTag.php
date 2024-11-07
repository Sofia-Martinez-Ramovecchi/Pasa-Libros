<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LibroTag
 * 
 * @property int $id_libro_tag
 * @property int $id_libro
 * @property int $id_tag
 * 
 * @property Libro $libro
 * @property Tag $tag
 *
 * @package App\Models
 */
class LibroTag extends Model
{
	protected $table = 'libro_tag';
	protected $primaryKey = 'id_libro_tag';
	public $timestamps = false;

	protected $casts = [
		'id_libro' => 'int',
		'id_tag' => 'int'
	];

	protected $fillable = [
		'id_libro',
		'id_tag'
	];

	public function libro()
	{
		return $this->belongsTo(Libro::class, 'id_libro');
	}

	public function tag()
	{
		return $this->belongsTo(Tag::class, 'id_tag');
	}
}
