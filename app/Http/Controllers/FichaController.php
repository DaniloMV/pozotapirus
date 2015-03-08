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

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//return view('ficha');

		$datos = Ficha::where('estreg','=','1')->orderBy('id', 'Desc')->paginate();

        //return $usuarios;

        return view('ficha.vis_ficha', compact('datos'))
			   ->with('title','Lista de Registro de Fichas');
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
			$ficha->usuario_id=Auth::user()->id;
			$ficha->fecha=date('d/m/Y h:i');
			$ficha->parroquia_id=$request->input('cmbparroquia');
			$ficha->barrio_id=$request->input('cmbbarrio');
			$ficha->calle=$request->input('txtcalle');
			$ficha->cmb_tipo_red_id=$request->input('cmbtipored');
			$ficha->cmb_tipo_calzada_id=$request->input('cmbtipocalzada');
			$ficha->cmb_material_colector_id=$request->input('cmbmaterialcolector');
			$ficha->cmb_estado_pozo_id=$request->input('cmbestadopozo');
			
			FichaController::VerificarCamposCHK($request, $ficha);

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

    public function getEditar($sec_ficha){

		return view('ficha.vis_ficha_editar')
		->with('title','Editar Ficha')
		->with('datos', Ficha::where('sec_ficha','=',$sec_ficha)->first());
	}

    public function postActualizar(Request $request){

		$sec_ficha = $request->input('hidden_sec');
		
		$validation = Ficha::validate($request->all());

		if($validation->fails()){
		 	return redirect('EditarFicha',$sec_ficha)->withErrors($validation);
		 	// Redirect::route('Editarficha',$id_ficha)->withErrors($validation);
		}
		else{

			$ficha = Ficha::where('sec_ficha','=',$sec_ficha)->first();

			$ficha->id=$request->input('txtpozocodigo');
			$ficha->usuario_id=Auth::user()->id;
			$ficha->fecha=date('d/m/Y h:i');
			$ficha->parroquia_id=$request->input('cmbparroquia');
			$ficha->barrio_id=$request->input('cmbbarrio');
			$ficha->calle=$request->input('txtcalle');
			$ficha->cmb_tipo_red_id=$request->input('cmbtipored');
			$ficha->cmb_tipo_calzada_id=$request->input('cmbtipocalzada');
			$ficha->cmb_material_colector_id=$request->input('cmbmaterialcolector');
			$ficha->cmb_estado_pozo_id=$request->input('cmbestadopozo');

			FichaController::VerificarCamposCHK($request, $ficha);
			
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

			//->with('status_message', 'Paciente modificado satisfactoriamente');

		}
	}

	public function VerificarCamposCHK($request, $ficha)
	{
		$ValorSEL = $request->input('chklimpio');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_limpio = $ValorSEL;
		
		$ValorSEL = $request->input('chkescalera');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_escalera = $ValorSEL;
		
		$ValorSEL = $request->input('chkhormigon');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_hormigon = $ValorSEL;

		$ValorSEL = $request->input('chkladrillo');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_ladrillo = $ValorSEL;

		$ValorSEL = $request->input('chkbloque');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_bloque = $ValorSEL;

		$ValorSEL = $request->input('chkmixto');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_mixto = $ValorSEL;

		$ValorSEL = $request->input('chktapa');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_tapa = $ValorSEL;

		$ValorSEL = $request->input('chkcadena');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_cadena = $ValorSEL;

		$ValorSEL = $request->input('chkbisagra');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_bisagra = $ValorSEL;
	}

	public function deleteActivarInactivar(Request $request){

		$sec_ficha = $request->input('sec');
		
		
		$ficha = Ficha::where('sec_ficha','=',$sec_ficha)->first();

		//return $ficha;

		$ficha->estreg=0;
	
		$ficha->save();

		return redirect('ficha');
		//->with('status_message', 'El estado fue Actualizado Satisfactoriamente');
	}

}
