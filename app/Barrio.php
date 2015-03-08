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


class Barrio extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
  	public $timestamps = false;
	protected $table = 'cmb_barrio';

    protected $perPage = 5;
	
	public static $rules = array(
	'des_barrio' => array('required', 'min:4')
	);

	public static $messages = array(
            'required'        => 'El nombre del barrio es obligatorio.',
            'min'             => 'El nombre del barrio debe tener al menos 4 carácteres.');

	/*

	$v = Validator::make($request->all(), [
        'title' => 'required|unique|max:255',
        'body' => 'required',
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }

    */

	public static function validate($data){ 
		return \Validator::make($data, static::$rules, static::$messages);
	}

}
