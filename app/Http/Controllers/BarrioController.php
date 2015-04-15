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

	public function getIndex()
	{
        if (\Auth::user()->usuario_tipo_id==2)
        {
			$datos = Barrio::with('modparroquia')
							->where('estreg','=','1')
							->orderBy('parroquia_id', 'Asc')
							->orderBy('des_barrio', 'Asc')->paginate();
							
	        return view('barrio.vis_barrio', compact('datos'));
        }
        //Digitador
		return redirect('/login');
	}

	public function getNuevo()
	{
        if (\Auth::user()->usuario_tipo_id==2)
        {
			return view('barrio.vis_barrio_nuevo')
			->with('title','Barrio');
        }
        //Digitador
		return redirect('/login');
	}

	public function postCrear(Request $request)
    {
        if (\Auth::user()->usuario_tipo_id==2)
        {
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
				$barrio->parroquia_id=$request->input('cmbparroquia');
				$barrio->des_barrio=$request->input('txtbarrio');
				$barrio->estreg=1;

				$barrio->save();
				return redirect('barrio');
			}
        }
        //Digitador
		return redirect('/login');
	}


	public function postEditar(Request $request)
	{
        if (\Auth::user()->usuario_tipo_id==2)
        {
            $id = $request->input('hidden_id');
			$parroquia_id = $request->input('hidden_parroquia_id');
			return view('barrio.vis_barrio_editar')
			->with('title','Editar Barrio')
			->with('datos', Barrio::where('id','=',$id)->where('parroquia_id','=',$parroquia_id)->first());
        }
        //Digitador
		return redirect('/login');
	}

	public function postActualizar(Request $request)
	{
        if (\Auth::user()->usuario_tipo_id==2)
        {
			$id = $request->input('hidden_id');
			$parroquia_id = $request->input('hidden_parroquia_id');
			
			$validation = Barrio::validateEditar($request->all());

			if($validation->fails()){
			 	return redirect('EditarUsuario',$id)->withErrors($validation);
			 	// Redirect::route('Editarusuario',$id_usuario)->withErrors($validation);
			}
			else{

				$barrio = Barrio::where('id','=',$id)
									->where('parroquia_id','=',$parroquia_id)
									->first();
				$barrio->des_barrio = $request->input('txtbarrio');
				$barrio->save();
				return redirect('barrio');
			}
        }
        //Digitador
		return redirect('/login');
	}

	public function deleteActivarInactivar(Request $request)
	{
        if (\Auth::user()->usuario_tipo_id==2)
        {
			$id = $request->input('hidden_id');
			$parroquia_id = $request->input('hidden_parroquia_id');
			$estado = $request->input('estado');

			$barrio = Barrio::where('id','=',$id)
								->where('parroquia_id','=',$parroquia_id)
								->first();
			if($estado == 1){
				$barrio->estreg=0;
			}
			else{
				$barrio->estreg=1;
			}
		
			$barrio->save();
			return redirect('barrio');
			//->with('status_message', 'El estado fue Actualizado Satisfactoriamente');
        }
        //Digitador
		return redirect('/login');
	}

}
