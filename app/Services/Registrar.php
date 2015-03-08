<?php namespace App\Services;

use App\Usuario;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:usuario',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return 'Ingreso';
		$sec = Usuario::max('id')+1;
		return Usuario::create([
			'id' => $sec,
			'name' => $data['txtname'],
			'email' => $data['txtemail'],
			'password' => bcrypt($data['txtpassword']),
			'usuario_equ_id' => $data['UsuarioEquipo'],
			'usuario_tipo_id' => $data['UsuarioTipo'],
			'estreg' => 1
		]);
	}

}
