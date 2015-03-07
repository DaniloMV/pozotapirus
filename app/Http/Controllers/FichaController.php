<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use App\Http\Requests\FichaRequest;
use App\Repositories\FichaRepository;
use App\Http\Controllers\Redirect;

use App\Ficha;



class FichaController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	//use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	/*
	public function __construct()
	{
		$this->middleware('guest');
	}
	*/

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//return view('ficha');

		$datos = Ficha::orderBy('id', 'Desc')->paginate();

        //return $usuarios;

        return view('ficha.vis_ficha', compact('datos'));
	}

	public function getNuevo()
	{
		return view('ficha.vis_ficha_nuevo')
			   ->with('title','Nueva Registro de Ficha');
	}


	public function postCrear(Request $request)
    {
		$validation = Ficha::validate($request->all());

		if($validation->fails()){
			// En caso de error regresa a la acción create con los datos y los errores encontrados
			return redirect()->back()->withInput()->withErrors($validation);
		}
		else
		{	


			$ficha=new Ficha;
			$ficha->id=$request->input('txtpozocodigo');
			$secuencial = Ficha::max('sec_ficha')+1;
			$ficha->sec_ficha = $secuencial;
			$ficha->usuario_id=1;//Auth::user()->id;
			$ficha->fecha='05/03/2015'; //time();
			$ficha->parroquia_id=$request->input('cmbparroquia');
			$ficha->barrio_id=$request->input('cmbbarrio');
			$ficha->calle=$request->input('txtcalle');
			$ficha->cmb_tipo_red_id=$request->input('cmbtipored');
			$ficha->cmb_tipo_calzada_id=$request->input('cmbtipocalzada');
			$ficha->cmb_material_colector_id=$request->input('cmbmaterialcolector');
			$ficha->cmb_estado_pozo_id=$request->input('cmbestadopozo');
			$ficha->es_limpio=$request->input('chklimpio');
			$ficha->es_escalera=$request->input('chkescalera');
			$ficha->es_hormigon=$request->input('chkhormigon');
			$ficha->es_ladrillo=$request->input('chkladrillo');
			$ficha->es_bloque=$request->input('chkbloque');
			$ficha->es_mixto=$request->input('chkmixto');
			$ficha->es_tapa=$request->input('chktapa');
			$ficha->es_cadena=$request->input('chkcadena');
			$ficha->es_bisagra=$request->input('chkbisagra');
			$ficha->sumidero=$request->input('txtsumidero');
			$ficha->gps='WGS84';
			$ficha->zona=$request->input('txtzona');
			$ficha->pozo=$request->input('txtpozo');
			$ficha->x=$request->input('txtcoordenadax');
			$ficha->y=$request->input('txtcoordenaday');
			$ficha->z=$request->input('txtcoordenadaz');
			$ficha->diametro_sup=$request->input('txtdiametrosup');
			$ficha->diametro_med=$request->input('txtdiametromedio');
			$ficha->diametro_inf=$request->input('txtdiametroinf');
			$ficha->cota=$request->input('txtcota');
			$ficha->altura=$request->input('txtaltura');
			$ficha->observaciones=$request->input('observaciones');
			$ficha->foto=$request->input('txtpozocodigo');
			$ficha->dibujo_ref=$request->input('txtpozocodigo');
			//$ficha->usu_revisa_id='';
			//$ficha->fecha_revisa='';
			$ficha->estreg=1;
			$ficha->save();
			return redirect('ficha');
		}
    }

}
