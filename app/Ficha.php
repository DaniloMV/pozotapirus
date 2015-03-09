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


class Ficha extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
  	public $timestamps = false;
	protected $table = 'ficha';

    protected $perPage = 5;

    public function modusuario(){
    	return $this->belongsTo('App\Usuario', 'usuario_id');
    }

    public function modparroquia(){
    	/*belongs_to para señalar la clave foránea, que existe en esta
		entre la tabla wcusuario y la tabla usuariotipos*/
        return $this->belongsTo('App\Parroquia', 'parroquia_id');
    }

    public function modbarrio(){
    	/*belongs_to para señalar la clave foránea, que existe en esta
		entre la tabla wcusuario y la tabla usuariotipos*/
        return $this->belongsTo('App\Barrio', 'barrio_id');
    }

    public function modtipored(){
    	/*belongs_to para señalar la clave foránea, que existe en esta
		entre la tabla wcusuario y la tabla usuariotipos*/
        return $this->belongsTo('App\Tipored', 'cmb_tipo_red_id');
    }

    public function modtipocalzada(){
    	/*belongs_to para señalar la clave foránea, que existe en esta
		entre la tabla wcusuario y la tabla usuariotipos*/
        return $this->belongsTo('App\Tipocalzada', 'cmb_tipo_calzada_id');
    }

    public function modmaterialcolector(){
    	/*belongs_to para señalar la clave foránea, que existe en esta
		entre la tabla wcusuario y la tabla usuariotipos*/
        return $this->belongsTo('App\Materialcolector', 'cmb_material_colector_id');
    }

    public function modestadopozo(){
    	/*belongs_to para señalar la clave foránea, que existe en esta
		entre la tabla wcusuario y la tabla usuariotipos*/
        return $this->belongsTo('App\Estadopozo', 'cmb_estado_pozo_id');
    }
    
    /*
	'txtpozo' => array('required'),
	'txtsumidero' => array('required'),
	'txtzona' => array('required'),
	'txtcoordenadax' => array('required'),
	'txtcoordenaday' => array('required'),
	'txtcoordenadaz' => array('required'),
	'txtcota' => array('required'),
	'txtdiametrosup' => array('required'),
	'txtdiametromedio' => array('required'),
	'txtdiametroinf' => array('required'),
	'txtaltura' => array('required')
	*/
	
	public static $rules = array(
     //'txtpozocodigo' => array('required')
     //|id|unique'),    
	// 'txtcalle' => array('required'),
 //    'cmbparroquia' => array('required'),
 //    'cmbbarrio' => array('required'),
 //    'cmbtipored' => array('required'),
 //    'cmbtipocalzada' => array('required'),
 //    'cmbmaterialcolector' => array('required'),
 //    'cmbestadopozo' => array('required'),
 //    'txtpozo' => array('required'),
 //    'txtsumidero' => array('required'),
 //    'txtzona' => array('required'),
 //    'txtcoordenadax' => array('required'),
 //    'txtcoordenaday' => array('required'),
 //    'txtcoordenadaz' => array('required'),
 //    'txtcota' => array('required'),
 //    'txtdiametrosup' => array('required'),
 //    'txtdiametromedio' => array('required'),
 //    'txtdiametroinf' => array('required'),
 //    'txtaltura' => array('required')
	);

    public static $ruleseditar = array( 
    //'txtpozocodigo' => array('required')  
    //'txtcalle' => array('required')
    // 'cmbparroquia' => array('required'),
    // 'cmbbarrio' => array('required'),
    // 'cmbtipored' => array('required'),
    // 'cmbtipocalzada' => array('required'),
    // 'cmbmaterialcolector' => array('required'),
    // 'cmbestadopozo' => array('required'),
    // 'txtpozo' => array('required'),
    // 'txtsumidero' => array('required'),
    // 'txtzona' => array('required'),
    // 'txtcoordenadax' => array('required'),
    // 'txtcoordenaday' => array('required'),
    // 'txtcoordenadaz' => array('required'),
    // 'txtcota' => array('required'),
    // 'txtdiametrosup' => array('required'),
    // 'txtdiametromedio' => array('required'),
    // 'txtdiametroinf' => array('required'),
    // 'txtaltura' => array('required')
    );

	public static $messages = array(
            'required'        => 'Verifica que todos los campos obligatorios esten llenos.',
            'unique'             => 'El código de ficha que se ha ingresado ya existe.',
            'min'             => 'minimo de carácteres - incumplido.');

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

    public static function validateeditar($data){ 
        return \Validator::make($data, static::$ruleseditar, static::$messages);
    }

}
