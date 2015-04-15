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

    protected $perPage = 30;

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

    
    public function modtipopozo(){
        /*belongs_to para señalar la clave foránea, que existe en esta
        entre la tabla Ficha y la tabla Tipo_Pozo*/
        return $this->belongsTo('App\Tipopozo', 'cmb_tipo_pozo_id');
    }

    public function modtipotapa(){
        /*belongs_to para señalar la clave foránea, que existe en esta
        entre la tabla Ficha y la tabla Tipo_Pozo*/
        return $this->belongsTo('App\Tipotapa', 'cmb_tipo_tapa_id');
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
    
   public static $rules = [
    
    'txtpozocodigo' => 'required|min:10|unique:ficha,id',
    'txtcalle' => 'required',
    'cmbparroquia' => 'required',
    'cmbbarrio' => 'required',
    'cmbtipored' => 'required',
    'cmbtipocalzada' => 'required',
    'cmbmaterialcolector' => 'required',
    'cmbtipopozo' => 'required',
    'cmbtipotapa' => 'required',
    'cmbestadopozo' => 'required',
    'txtcoordenadax' => 'required|numeric',
    'txtcoordenaday' => 'required|numeric',
    'txtcoordenadaz' => 'required|numeric',
    'txtdiametroe1' => 'required|numeric',
    'txtdiametroe2' => 'numeric',
    'txtdiametroe3' => 'numeric',
    'txtdiametroe4' => 'numeric',
    'txtdiametroe5' => 'numeric',
    'txtdiametrosalida' => 'required|numeric',
    'txtaltura' => 'required|numeric'
    
    ];

    public static $rulesEditar = [
    
    'txtpozocodigo' => 'required|min:10',
    'txtcalle' => 'required',
    'cmbparroquia' => 'required',
    'cmbbarrio' => 'required',
    'cmbtipored' => 'required',
    'cmbtipocalzada' => 'required',
    'cmbmaterialcolector' => 'required',
    'cmbtipopozo' => 'required',
    'cmbtipotapa' => 'required',
    'cmbestadopozo' => 'required',
    'txtcoordenadax' => 'required|numeric',
    'txtcoordenaday' => 'required|numeric',
    'txtcoordenadaz' => 'required|numeric',
    'txtdiametroe1' => 'required|numeric',
    'txtdiametroe2' => 'numeric',
    'txtdiametroe3' => 'numeric',
    'txtdiametroe4' => 'numeric',
    'txtdiametroe5' => 'numeric',
    'txtdiametrosalida' => 'required|numeric',
    'txtaltura' => 'required|numeric'
    
    ];

    public static $messages = [
    'txtpozocodigo.required' => 'El código de pozo obligatorio',
    'txtpozocodigo.min:10' => 'El código de pozo debe tener 10 caracteres',
    'txtpozocodigo.max:10' => 'El código de pozo debe tener 10 caracteres',
    'txtpozocodigo.unique' => 'El código de pozo ya existe',
    'txtcalle.required' => 'Es importante ingresar el nombre de la calle',
    'txtdiametroe1.required' => 'Diámetro de la Entrada 1 es obligatorio',
    'txtdiametroe1.numeric' => 'Diámetro de la Entrada 1 debe ser numérico',
    'txtdiametroe2.numeric' => 'Diámetro de la Entrada 2 debe ser numérico',
    'txtdiametroe3.numeric' => 'Diámetro de la Entrada 3 debe ser numérico',
    'txtdiametroe4.numeric' => 'Diámetro de la Entrada 4 debe ser numérico',
    'txtdiametroe5.numeric' => 'Diámetro de la Entrada 5 debe ser numérico',
    'txtdiametrosalida.required' => 'Diámetro de salida es obligatorio',
    'txtdiametrosalida.numeric' => 'Diámetro de Salida debe ser numérico',
    'txtaltura.required' => 'La altura es obligatorio',
    'txtaltura.numeric' => 'La altura debe ser numérico',
    'cmbparroquia.required' => 'La parroquia obligatorio',
    'cmbbarrio.required' => 'La barrio obligatorio',
    'cmbtipored.required' => 'El tipo de red obligatorio',
    'cmbtipocalzada.required' => 'El tipo de calzada obligatorio',
    'cmbmaterialcolector.required' => 'El material colectos obligatorio',
    'cmbtipopozo.required' => 'El tipo de pozo obligatorio',
    'cmbtipotapa.required' => 'El tipo de tapa obligatorio',
    'cmbestadopozo.required' => 'El estado de pozo obligatorio',
    'txtcoordenadax.required' => 'La coordena "X" es obligatorio',
    'txtcoordenadax.numeric' => 'La coordena "X" debe ser numérico',
    'txtcoordenaday.required' => 'La coordena "Y" es obligatorio',
    'txtcoordenaday.numeric' => 'La coordena "Y" debe ser numérico',
    'txtcoordenadaz.required' => 'La coordena "Z" es obligatorio',
    'txtcoordenadaz.numeric' => 'La coordena "Z" debe ser numérico'

    ];

    /*
	public static $messages = array(
            'required'        => 'Verifica que todos los campos obligatorios esten llenos.',
            'unique'             => 'El código de ficha que se ha ingresado ya existe.',
            'min'             => 'mínimo de carácteres - incumplido.');
    */ 

	public static function validate($data){ 
		return \Validator::make($data, static::$rules, static::$messages);
	}

    public static function validateEditar($data){ 
        return \Validator::make($data, static::$rulesEditar, static::$messages);
    }

}
