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
use App\Barrio;
use App\Tipocalzada;
use App\Tipored;
use dompdf\dompdf;

class FichaController extends Controller {

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//Admin
		if (\Auth::user()->usuario_tipo_id==2)
		{
			$this->middleware('auth');
		}
		else 
		{
			//Digitador
			return redirect('/login');
		}
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
		//\Auth::user()->id;
		if (\Auth::user()->usuario_tipo_id==2)
		{
			$datos = Ficha::where('estreg','=','1')
					->orderBy('sec_ficha', 'Desc')->paginate();
		}
		else
		{
			$datos = Ficha::where('estreg','=','1')
					->where('usuario_id',"=",\Auth::user()->id)
					->orderBy('sec_ficha', 'Desc')->paginate();	
		}
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

		$codigoverificar = Ficha::where('id','=',$request->input('txtpozocodigo'))->first();

		$estadocodigo = 1;

		if(empty($codigoverificar) || count($codigoverificar) == 0)
		{
			$estadocodigo = 0;
		}
		if($estadocodigo == 0) 
		{
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
				$ficha->usuario_id=\Auth::user()->id;
				$ficha->fecha=strtotime('now');
				$ficha->parroquia_id=$request->input('cmbparroquia');
				$ficha->barrio_id=$request->input('cmbbarrio');
				$ficha->calle=$request->input('txtcalle');
				$ficha->cmb_tipo_red_id=$request->input('cmbtipored');
				$ficha->cmb_tipo_calzada_id=$request->input('cmbtipocalzada');
				$ficha->cmb_material_colector_id=$request->input('cmbmaterialcolector');
				$ficha->cmb_tipo_pozo_id=$request->input('cmbtipopozo');
				$ficha->cmb_tipo_tapa_id=$request->input('cmbtipotapa');
				$ficha->cmb_estado_pozo_id=$request->input('cmbestadopozo');

				FichaController::VerificarCamposCHK($request, $ficha);

				
				$ficha->gps='WGS84';
				$ficha->zona=17;
				$ficha->x=$request->input('txtcoordenadax');
				$ficha->y=$request->input('txtcoordenaday');
				$ficha->z=$request->input('txtcoordenadaz');
				$ficha->entrada_1=$request->input('txtdiametroe1');
				$ficha->entrada_2=$request->input('txtdiametroe2');
				$ficha->entrada_3=$request->input('txtdiametroe3');
				$ficha->entrada_4=$request->input('txtdiametroe4');
				$ficha->entrada_5=$request->input('txtdiametroe5');
				$ficha->salida=$request->input('txtdiametrosalida');
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
		else
		{
			return redirect('ficha/Nuevo')->withInput()->withErrors(array('msg' => 'No se puede guardar. El código de ficha que se ha ingresado ya existe.'));
		}
    }

    public function postEditar(Request $request){
    	$sec_ficha=$request->input('sec');
		return view('ficha.vis_ficha_editar')
		->with('title','Editar Ficha')
		->with('datos', Ficha::where('sec_ficha','=',$sec_ficha)->first());
	}

    public function postActualizar(Request $request){

		$sec_ficha = $request->input('hidden_sec');
		
		$validation = Ficha::validateEditar($request->all());

		$codigoverificar = Ficha::where('id','=',$request->input('txtpozocodigo'))
									->where('sec_ficha','!=',$request->input('hidden_sec'))
									->first();

		$estadocodigo = 1;

		if(empty($codigoverificar) || count($codigoverificar) >= 1)
		{
			$estadocodigo = 0;
		}

		if($estadocodigo == 0) 
		{

			if($validation->fails()){
			 	return redirect('EditarFicha',$sec_ficha)->withErrors($validation);
			 	// Redirect::route('Editarficha',$id_ficha)->withErrors($validation);
			}
			else{

				$ficha = Ficha::where('sec_ficha','=',$sec_ficha)->first();
				//Auth::user()->name
				$ficha->id=$request->input('txtpozocodigo');
				$ficha->usuario_id= \Auth::user()->id;
				$ficha->fecha = strtotime('now');
				$ficha->parroquia_id=$request->input('cmbparroquia');
				$ficha->barrio_id=$request->input('cmbbarrio');
				$ficha->calle=$request->input('txtcalle');
				$ficha->cmb_tipo_red_id=$request->input('cmbtipored');
				$ficha->cmb_tipo_calzada_id=$request->input('cmbtipocalzada');
				$ficha->cmb_material_colector_id=$request->input('cmbmaterialcolector');
				$ficha->cmb_tipo_pozo_id=$request->input('cmbtipopozo');
				$ficha->cmb_tipo_tapa_id=$request->input('cmbtipotapa');
				$ficha->cmb_estado_pozo_id=$request->input('cmbestadopozo');

				FichaController::VerificarCamposCHK($request, $ficha);
				
				$ficha->gps='WGS84';
				$ficha->zona=17;
				$ficha->x=$request->input('txtcoordenadax');
				$ficha->y=$request->input('txtcoordenaday');
				$ficha->z=$request->input('txtcoordenadaz');
				$ficha->entrada_1=$request->input('txtdiametroe1');
				$ficha->entrada_2=$request->input('txtdiametroe2');
				$ficha->entrada_3=$request->input('txtdiametroe3');
				$ficha->entrada_4=$request->input('txtdiametroe4');
				$ficha->entrada_5=$request->input('txtdiametroe5');
				$ficha->salida=$request->input('txtdiametrosalida');
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
		else
		{
			return redirect('ficha')->withInput()->withErrors(array('msg' => 'No se puede guardar. El código de ficha que se ha ingresado ya existe.'));
		}
	}

	public function VerificarCamposCHK($request, $ficha)
	{
		if(empty(trim($request->get('chklimpio')))==true || $request->get('chklimpio')=="0")
		{
			$ficha->es_limpio=0;	
		}
		else
		{
			$ficha->es_limpio=1;
		}
		 
		$ficha->es_escalera = trim($request->get('chkescalera'))=='' || $request->get('chkescalera')=="0"?0:1;
		$ficha->es_hormigon = trim($request->get('chkhormigon'))=='' || $request->get('chkhormigon')=="0"?0:1;
		$ficha->es_ladrillo = trim($request->get('chkladrillo'))=='' || $request->get('chkladrillo')=="0"?0:1;
		$ficha->es_bloque = trim($request->get('chkbloque'))=='' || $request->get('chkbloque')=="0"?0:1;
		$ficha->es_mixto = trim($request->get('chkmixto'))=='' || $request->get('chkmixto')=="0"?0:1;
		$ficha->es_tapa = trim($request->get('chktapa'))=='' || $request->get('chktapa')=="0"?0:1;
		$ficha->es_cadena = trim($request->get('chkcadena'))=='' || $request->get('chkcadena')=="0"?0:1;
		$ficha->es_bisagra = trim($request->get('chkbisagra'))=='' || $request->get('chkbisagra')=="0"?0:1;
	}
	/*
	public function VerificarCamposCHK($request, $ficha)
	{
		$ValorSEL = $request->input('chklimpio');
		if(empty($ValorSEL) || count($ValorSEL) == 0)
		{
			$ValorSEL = 0;
		}
		$ficha->es_limpio = empty($ValorSEL) || count($ValorSEL) == 0?0:1;
		
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
	*/

	public function VerificaVacios($request){
		
		
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

	public function getBuscar($id_parroquia){

       if (\Request::ajax()) {
       $listado = Barrio::where('Parroquia_id','=',$id_parroquia)
        		->where('estreg','=',1)
                ->orderBy('des_barrio', 'Asc')->get()->toArray();

       return \Response::json(array('listados' => $listado));
       }
       return 0;
    }

	public function getReporteficha()
	{
        
        $tiporedes = Tipored::orderBy('id', 'Asc')->get();

        $tipocalzadas = Tipocalzada::orderBy('id', 'Asc')->get();

        $html = view('ficha.vis_fichareporte', compact('tiporedes', 'tipocalzadas'))
			   ->with('title','Reporte de fichas');
        
        //return PDF::load(utf8_decode($html), 'A4', 'portrait')->show();
        

        $pdf = \App::make('dompdf');
		//$pdf->loadHTML('<h1>Test</h1>');
		$pdf->loadHTML($html);
		return $pdf->stream();
    }

}
