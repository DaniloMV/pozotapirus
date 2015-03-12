<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use App\Http\Requests\ParroquiaRequest;
use App\Repositories\ParroquiaRepository;
use App\Http\Controllers\Redirect;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Parroquia;

class ParroquiaController extends Controller {

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

        $datos = Parroquia::where('estreg','=','1')->orderBy('id', 'Asc')->paginate();

        //return $datos;

        return view('parroquia.vis_parroquia', compact('datos'))
			   ->with('title','Parroquia');

	}

	public function getNuevo()
	{
		return view('parroquia.vis_parroquia_nuevo')
			   ->with('title','Nueva Parroquia');
	}

	public function postCrear(Request $request)
    {
			
		$parroquia=new Parroquia;
		$secuencial = Parroquia::max('id')+1;
		$parroquia->id = $secuencial;
		$parroquia->des_parroquia = $request->input('txtparroquia');
		$parroquia->estreg=1;

		$parroquia->save();
		return redirect('parroquia');
		
	}

	public function getEditar($id){
		return view('parroquia.vis_parroquia_editar')
		->with('title','Editar Parroquia')
		->with('datos', Parroquia::where('id','=',$id)->first());
	}

    public function postActualizar(Request $request){

		$id = $request->input('hidden_id');
		$parroquia = Parroquia::where('id','=',$id)->first();
		$parroquia->des_parroquia = $request->input('txtparroquia');
		$parroquia->save();
		return redirect('parroquia');
		
	}

	public function deleteActivarInactivar(Request $request){

		$id = $request->input('id');
		$parroquia = Parroquia::where('id','=',$id)->first();
		$parroquia->estreg=0;
		$parroquia->save();
		return redirect('parroquia');
		//->with('status_message', 'El estado fue Actualizado Satisfactoriamente');
	}

}