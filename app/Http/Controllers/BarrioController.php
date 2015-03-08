<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use App\Http\Requests\BarrioRequest;
use App\Repositories\BarrioRepository;
use App\Http\Controllers\Redirect;

use App\Barrio;


class BarrioController extends Controller {

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

		$datos = Barrio::orderBy('id', 'Asc')->paginate();

        //return $usuarios;

        return view('barrio.vis_barrio', compact('datos'));

	}

	public function getNuevo(){
		return view('barrio.vis_barrio_nuevo')
		->with('title','Barrio');
	}

	public function postCrear(Request $request)
    {
        //$name = $request->input('Nombre');

        //$inputs = Request::all();
			
		$validation = Barrio::validate($request->all());

		if($validation->fails()){
			// En caso de error regresa a la acción create con los datos y los errores encontrados
			return redirect()->back()->withInput()->withErrors($validation);
		}
		else
		{	
			$barrio=new Barrio;
			$secuencial = Barrio::max('id')+1;
			$barrio->id = $secuencial;
			$barrio->des_barrio=$request->input('Nombre');
			$barrio->estreg=1;

			$barrio->save();
			return redirect('barrio');
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
