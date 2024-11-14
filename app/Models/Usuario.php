<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * Created by Reliese Model.
 */

/**
 * Class Usuario atributos comentados
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

class Usuario extends Authenticatable
{

    //atributos para login y registro
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'usuario'; // Asegúrate de que este es el nombre_usuario correcto de la tabla

    protected $primaryKey = 'id_usuario';

    public $timestamps = true; //probar si es true o false

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_usuario',
        'email',
        'password',
        'profile_photo', // Agrega este campo
        'id_estado_cuenta',//tendra un valor por defecto de 1
        'google_id',
        'google_token',
        'google_refresh_token',
        //'id_rol' => 'int', cambia porque cambiamos la base de datos
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

    ];
	public function estado_cuentum()
	{
		return $this->belongsTo(EstadoCuentum::class, 'id_estado_cuenta');
	}

    //acceder a nombre de rol para no mostrar nombre de rol
//	public function rol_usuario()
//	{
//		return $this->belongsTo(RolUsuario::class, 'id_rol');
//	}

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
