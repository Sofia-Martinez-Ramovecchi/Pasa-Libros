<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property int $id_rol
 * @property int $id_estado_cuenta
 * @property string $nombre_usuario
 * @property string $password
 * @property string $email
 * 
 * @property EstadoCuentum $estado_cuentum
 * @property RolUsuario $rol_usuario
 * @property Collection|Critica[] $criticas
 * @property Collection|Libro[] $libros
 * @property Collection|Mensaje[] $mensajes
 * @property Collection|PublicacionReporte[] $publicacion_reportes
 * @property Collection|SolicitudIntercambio[] $solicitud_intercambios
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';
	public $timestamps = false;

	protected $casts = [
		'id_rol' => 'int',
		'id_estado_cuenta' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'id_rol',
		'id_estado_cuenta',
		'nombre_usuario',
		'password',
		'email'
	];

	public function estado_cuentum()
	{
		return $this->belongsTo(EstadoCuentum::class, 'id_estado_cuenta');
	}

	public function rol_usuario()
	{
		return $this->belongsTo(RolUsuario::class, 'id_rol');
	}

	public function criticas()
	{
		return $this->hasMany(Critica::class, 'id_usuario');
	}

	public function libros()
	{
		return $this->hasMany(Libro::class, 'id_usuario');
	}

	public function mensajes()
	{
		return $this->hasMany(Mensaje::class, 'id_usuario_receptor');
	}

	public function publicacion_reportes()
	{
		return $this->hasMany(PublicacionReporte::class, 'id_usuario');
	}

	public function solicitud_intercambios()
	{
		return $this->hasMany(SolicitudIntercambio::class, 'id_usuario_ofertante');
	}
}
