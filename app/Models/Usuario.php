<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

 use Carbon\Carbon;
 use Illuminate\Database\Eloquent\Collection;
 use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Traits\HasRoles;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property int $id_estado_cuenta
 * @property string $nombre_usuario
 * @property string $password
 * @property string $email
 * @property string|null $profile_photo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $google_id
 * @property string|null $google_token
 * @property string|null $google_refresh_token
 * @property string|null $remember_token
 * 
 * @property EstadoCuentum $estado_cuentum
 * @property Collection|Critica[] $criticas
 * @property Collection|Libro[] $libros
 * @property Collection|Mensaje[] $mensajes
 * @property Collection|PublicacionReporte[] $publicacion_reportes
 * @property Collection|SolicitudIntercambio[] $solicitud_intercambios
 *
 * @package App\Models
 */
class Usuario extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;

    
	protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';

	protected $casts = [
		'id_estado_cuenta' => 'int'
	];

	protected $hidden = [
		'password',
		'id_estado_cuenta',
		'google_token',
		'google_refresh_token',
		'remember_token'
	];

	protected $fillable = [
		'id_estado_cuenta',
		'nombre_usuario',
		'password',
		'email',
		'profile_photo',
		'google_id',
		'google_token',
		'google_refresh_token',
		'remember_token'
	];

	public function estado_cuentum()
	{
		return $this->belongsTo(EstadoCuentum::class, 'id_estado_cuenta');
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

	// En el modelo Usuario.php
public function localidad()
{
    return $this->belongsTo(Localidad::class, 'id_localidad');
}

}
