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
				$ficha->diametro_tapa=$request->input('diametrotapa');
				$ficha->cmb_estado_pozo_id=$request->input('cmbestadopozo');

				FichaController::VerificarCamposCHK($request, $ficha);

				
				$ficha->gps='WGS84';
				$ficha->zona=17;
				$ficha->x=$request->input('txtcoordenadax');
				$ficha->y=$request->input('txtcoordenaday');
				$ficha->z=$request->input('txtcoordenadaz');
				
				//entradas
				$ficha->entrada_1=$request->input('txtdiametroe1');
				$ficha->entrada_2=$request->input('txtdiametroe2');
				$ficha->entrada_3=$request->input('txtdiametroe3');
				$ficha->entrada_4=$request->input('txtdiametroe4');
				$ficha->entrada_5=$request->input('txtdiametroe5');
				$ficha->entrada_6=$request->input('txtdiametroe6');
				$ficha->entrada_7=$request->input('txtdiametroe7');
				$ficha->entrada_7=$request->input('txtdiametroe8');
				$ficha->entrada_9=$request->input('txtdiametroe9');
				$ficha->entrada_10=$request->input('txtdiametroe10');
				$ficha->entrada_11=$request->input('txtdiametroe11');
				$ficha->entrada_12=$request->input('txtdiametroe12');

				//alturas
				$ficha->altura_e1=$request->input('txtalturae1');
				$ficha->altura_e2=$request->input('txtalturae2');
				$ficha->altura_e3=$request->input('txtalturae3');
				$ficha->altura_e4=$request->input('txtalturae4');
				$ficha->altura_e5=$request->input('txtalturae5');
				$ficha->altura_e6=$request->input('txtalturae6');
				$ficha->altura_e7=$request->input('txtalturae7');
				$ficha->altura_e8=$request->input('txtalturae8');
				$ficha->altura_e9=$request->input('txtalturae9');
				$ficha->altura_e10=$request->input('txtalturae10');
				$ficha->altura_e11=$request->input('txtalturae11');
				$ficha->altura_e12=$request->input('txtalturae12');	

				//camaras
				$ficha->camara_e1=$request->input('txtcamarae1');
				$ficha->camara_e2=$request->input('txtcamarae2');
				$ficha->camara_e3=$request->input('txtcamarae3');
				$ficha->camara_e4=$request->input('txtcamarae4');
				$ficha->camara_e5=$request->input('txtcamarae5');
				$ficha->camara_e6=$request->input('txtcamarae6');
				$ficha->camara_e7=$request->input('txtcamarae7');
				$ficha->camara_e8=$request->input('txtcamarae8');
				$ficha->camara_e9=$request->input('txtcamarae9');
				$ficha->camara_e10=$request->input('txtcamarae10');
				$ficha->camara_e11=$request->input('txtcamarae11');
				$ficha->camara_e12=$request->input('txtcamarae12');	

				//material colector
				$ficha->cmb_material_colector_e1=$request->input('cmbmaterialcolectore1');
				$ficha->cmb_material_colector_e2=$request->input('cmbmaterialcolectore2');
				$ficha->cmb_material_colector_e3=$request->input('cmbmaterialcolectore3');
				$ficha->cmb_material_colector_e4=$request->input('cmbmaterialcolectore4');
				$ficha->cmb_material_colector_e5=$request->input('cmbmaterialcolectore5');
				$ficha->cmb_material_colector_e6=$request->input('cmbmaterialcolectore6');
				$ficha->cmb_material_colector_e7=$request->input('cmbmaterialcolectore7');
				$ficha->cmb_material_colector_e8=$request->input('cmbmaterialcolectore8');
				$ficha->cmb_material_colector_e9=$request->input('cmbmaterialcolectore9');
				$ficha->cmb_material_colector_e10=$request->input('cmbmaterialcolectore10');
				$ficha->cmb_material_colector_e11=$request->input('cmbmaterialcolectore11');
				$ficha->cmb_material_colector_e12=$request->input('cmbmaterialcolectore12');					
				
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
				$ficha->usu_revisa_id = \Auth::user()->id;
				$ficha->fecha_revisa = strtotime('now');
				$ficha->parroquia_id=$request->input('cmbparroquia');
				$ficha->barrio_id=$request->input('cmbbarrio');
				$ficha->calle=$request->input('txtcalle');
				$ficha->cmb_tipo_red_id=$request->input('cmbtipored');
				$ficha->cmb_tipo_calzada_id=$request->input('cmbtipocalzada');
				$ficha->cmb_material_colector_id=$request->input('cmbmaterialcolector');
				$ficha->cmb_tipo_pozo_id=$request->input('cmbtipopozo');
				$ficha->cmb_tipo_tapa_id=$request->input('cmbtipotapa');
				$ficha->diametro_tapa=$request->input('diametrotapa');
				$ficha->cmb_estado_pozo_id=$request->input('cmbestadopozo');

				FichaController::VerificarCamposCHK($request, $ficha);
				
				$ficha->gps='WGS84';
				$ficha->zona=17;
				$ficha->x=$request->input('txtcoordenadax');
				$ficha->y=$request->input('txtcoordenaday');
				$ficha->z=$request->input('txtcoordenadaz');


				//entradas
				$ficha->entrada_1=$request->input('txtdiametroe1');
				$ficha->entrada_2=$request->input('txtdiametroe2');
				$ficha->entrada_3=$request->input('txtdiametroe3');
				$ficha->entrada_4=$request->input('txtdiametroe4');
				$ficha->entrada_5=$request->input('txtdiametroe5');
				$ficha->entrada_6=$request->input('txtdiametroe6');
				$ficha->entrada_7=$request->input('txtdiametroe7');
				$ficha->entrada_7=$request->input('txtdiametroe8');
				$ficha->entrada_9=$request->input('txtdiametroe9');
				$ficha->entrada_10=$request->input('txtdiametroe10');
				$ficha->entrada_11=$request->input('txtdiametroe11');
				$ficha->entrada_12=$request->input('txtdiametroe12');

				//alturas
				$ficha->altura_e1=$request->input('txtalturae1');
				$ficha->altura_e2=$request->input('txtalturae2');
				$ficha->altura_e3=$request->input('txtalturae3');
				$ficha->altura_e4=$request->input('txtalturae4');
				$ficha->altura_e5=$request->input('txtalturae5');
				$ficha->altura_e6=$request->input('txtalturae6');
				$ficha->altura_e7=$request->input('txtalturae7');
				$ficha->altura_e8=$request->input('txtalturae8');
				$ficha->altura_e9=$request->input('txtalturae9');
				$ficha->altura_e10=$request->input('txtalturae10');
				$ficha->altura_e11=$request->input('txtalturae11');
				$ficha->altura_e12=$request->input('txtalturae12');	

				//camaras
				$ficha->camara_e1=$request->input('txtcamarae1');
				$ficha->camara_e2=$request->input('txtcamarae2');
				$ficha->camara_e3=$request->input('txtcamarae3');
				$ficha->camara_e4=$request->input('txtcamarae4');
				$ficha->camara_e5=$request->input('txtcamarae5');
				$ficha->camara_e6=$request->input('txtcamarae6');
				$ficha->camara_e7=$request->input('txtcamarae7');
				$ficha->camara_e8=$request->input('txtcamarae8');
				$ficha->camara_e9=$request->input('txtcamarae9');
				$ficha->camara_e10=$request->input('txtcamarae10');
				$ficha->camara_e11=$request->input('txtcamarae11');
				$ficha->camara_e12=$request->input('txtcamarae12');	

				//material colector
				$ficha->cmb_material_colector_e1=$request->input('cmbmaterialcolectore1');
				$ficha->cmb_material_colector_e2=$request->input('cmbmaterialcolectore2');
				$ficha->cmb_material_colector_e3=$request->input('cmbmaterialcolectore3');
				$ficha->cmb_material_colector_e4=$request->input('cmbmaterialcolectore4');
				$ficha->cmb_material_colector_e5=$request->input('cmbmaterialcolectore5');
				$ficha->cmb_material_colector_e6=$request->input('cmbmaterialcolectore6');
				$ficha->cmb_material_colector_e7=$request->input('cmbmaterialcolectore7');
				$ficha->cmb_material_colector_e8=$request->input('cmbmaterialcolectore8');
				$ficha->cmb_material_colector_e9=$request->input('cmbmaterialcolectore9');
				$ficha->cmb_material_colector_e10=$request->input('cmbmaterialcolectore10');
				$ficha->cmb_material_colector_e11=$request->input('cmbmaterialcolectore11');
				$ficha->cmb_material_colector_e12=$request->input('cmbmaterialcolectore12');
				
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
		$ficha->es_limpio = trim($request->input('chklimpio'))==''|| $request->input('chklimpio')=="0"?0:1;
		$ficha->es_escalera = trim($request->input('chkescalera'))=='' || $request->input('chkescalera')=="0"?0:1;
		$ficha->es_hormigon = trim($request->input('chkhormigon'))==''|| $request->input('chkhormigon')=="0"?0:1;
		$ficha->es_ladrillo = trim($request->input('chkladrillo'))=='' || $request->input('chkladrillo')=="0"?0:1;
		$ficha->es_bloque = trim($request->input('chkbloque'))=='' || $request->input('chkbloque')=="0"?0:1;
		$ficha->es_mixto = trim($request->input('chkmixto'))=='' || $request->input('chkmixto')=="0"?0:1;
		$ficha->es_tapa = trim($request->input('chktapa'))=='' || $request->input('chktapa')=="0"?0:1;
		$ficha->es_cadena = trim($request->input('chkcadena'))=='' || $request->input('chkcadena')=="0"?0:1;
		$ficha->es_bisagra = trim($request->input('chkbisagra'))=='' || $request->input('chkbisagra')=="0"?0:1;
	}
	

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