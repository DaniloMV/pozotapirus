<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;

class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//public $timestamps = false;
	protected $table = 'usuario';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function modusuariotipo(){
    	/*belongs_to para señalar la clave foránea, que existe en esta
		entre la tabla wcusuario y la tabla usuariotipos*/
        return $this->belongsTo('App\Usuariotipo', 'usuario_tipo_id');
    }
    public function modusuarioequipo(){
    	return $this->belongsTo('App\Usuarioequipo', 'usuario_equ_id');
    }

    protected $perPage = 5;
	
	public static $rules = array(
		'txtusuario' => 'required|min:4',
		'txtemail' => 'required|email',    
		'txtpassword' => 'required|min:4',
		'password_confirmation' => 'required|min:4',
		'UsuarioEquipo' => 'required',
		'UsuarioTipo' => 'required'
	);

	public static $messages = array(
            'required'        => 'Verifica que todos los campos obligatorios esten llenos.',
            'unique'             => 'El correo del usuario que se ha ingresado ya existe.',
            'min'             => 'Debe tener al menos 4 carácteres.');


	public static function validate($data){ 
		return \Validator::make($data, static::$rules, static::$messages);
	}


}
