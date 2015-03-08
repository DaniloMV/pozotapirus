<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;



class Parroquia extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps = false;

	protected $table = 'cmb_parroquia';


	protected $perPage = 20;
	
	public static $rules = array(
	'txtparroquia' => array('required', 'min:3')
	);

	public static $messages = array(
            'required'        => 'El nombre de la parroquia es obligatorio.',
            'min'             => 'El nombre de la parroquia debe tener al menos 3 carácteres.');


	public static function validate($data){ 
		return \Validator::make($data, static::$rules, static::$messages);
	}


}
