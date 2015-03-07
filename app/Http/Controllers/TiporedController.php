<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use App\Http\Requests\TiporedRequest;
use App\Repositories\TiporedRepository;
use App\Http\Controllers\Redirect;

use App\Tipored;


class TiporedController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	

	public function getIndex()
	{

		$datos = Tipored::orderBy('id', 'Asc')->paginate();

        //return $usuarios;

        return view('tipored.vis_tipo_red', compact('datos'));

	}

	public function getNuevo(){
		return view('tipored.vis_tipo_red_nuevo')
		->with('title','Nuevo Tipo de Red');
	}

	public function postCrear(Request $request)
    {
        //$name = $request->input('Nombre');

        //$inputs = Request::all();
			
		$validation = Tipored::validate($request->all());

		if($validation->fails()){
			// En caso de error regresa a la acción create con los datos y los errores encontrados
			return redirect()->back()->withInput()->withErrors($validation);
		}
		else
		{	
			$tipored=new Tipored;
			$secuencial = Tipored::max('id')+1;
			$tipored->id = $secuencial;
			$tipored->des_tipored=$request->input('Nombre');
			$tipored->estreg=1;

			$tipored->save();
			return redirect('tipored');
			//return \Redirect::route('tipored');
			//->with('status_message','El Consultorio fue creado satisfactoriamente.');
		}
	}


	public function postCrearTh(){
			
		$validation = Tipored::validate(Input::all());

		if($validation->fails()){
			// En caso de error regresa a la acción create con los datos y los errores encontrados
			//return Redirect::route('NuevoTipored')->withInput()->withErrors($validation);
			return redirect('NuevoTipored')->withInput()->withErrors($validation);
		}
		else
		{	
			$tipored=new Tipored;
			$secuencial = Tipored::max('id')+1;
			$tipored->id = $secuencial;
			$tipored->descripcion=Input::get('Nombre');
			$tipored->estreg="ACT";

			$tipored->save();
			return redirect('tipo');
			//return Redirect::route('tipored');//->with('status_message','El Consultorio fue creado satisfactoriamente.');
		}
	}

}
