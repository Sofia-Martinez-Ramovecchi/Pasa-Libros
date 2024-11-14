<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provincium
 * 
 * @property int $id_provincia
 * @property string $nombre_provincia
 * 
 * @property Collection|Localidad[] $localidads
 *
 * @package App\Models
 */
class Provincium extends Model
{
	protected $table = 'provincia';
	protected $primaryKey = 'id_provincia';
	public $timestamps = false;

	protected $fillable = [
		'nombre_provincia'
	];

	public function localidads()
	{
		return $this->hasMany(Localidad::class, 'id_provincia');
	}
}
