<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Repositories\UsuarioRepository;
use App\Http\Controllers\Redirect;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Usuario;

class UsuarioController extends Controller {

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

        $datos = Usuario::with('modusuariotipo', 'modusuarioequipo')
                ->orderBy('id', 'Asc')->paginate();

        //return $datos;

        return view('usuario.vis_usuario', compact('datos'))
			   ->with('title','Lista de Usuarios');

	}

	public function getNuevo()
	{
		return view('usuario.vis_usuario_nuevo')
			   ->with('title','Nuevo Usuario');
	}
	public function getSalir()
	{
		\Auth::logout();
		return redirect('/login');
	}

	public function postCrear(Request $request)
    {
		$validation = Usuario::validate($request->all());

		if($validation->fails()){
			// En caso de error regresa a la acción create con los datos y los errores encontrados
			return redirect()->back()->withInput()->withErrors($validation);
		}
		else
		{	
			$usuario=new Usuario;
			$secuencial = Usuario::max('id')+1;
			$usuario->id = $secuencial;
			$usuario->name = $request->input('txtusuario');
			$usuario->email = $request->input('txtemail');
			$usuario->password = bcrypt($request->input('password'));
			$usuario->usuario_equ_id = $request->input('UsuarioEquipo');
			$usuario->usuario_tipo_id = $request->input('UsuarioTipo');
			//$usuario->timestamps();
			//$usuario->rememberToken();

			$usuario->estreg=1;

			$usuario->save();
			return redirect('usuario');
		}
	}

	public function getEditar($id){

		return view('usuario.vis_usuario_editar')
		->with('title','Editar Usuario')
		->with('datos', Usuario::where('id','=',$id)->first());
	}

    public function postActualizar(Request $request){

		$id = $request->input('hidden_id');
		
		$validation = Usuario::validateEditar($request->all());

		if($validation->fails()){
		 	return redirect('EditarUsuario',$id)->withErrors($validation);
		 	// Redirect::route('Editarusuario',$id_usuario)->withErrors($validation);
		}
		else{

			$usuario = Usuario::where('id','=',$id)->first();
			$usuario->name = $request->input('txtusuario');
			$usuario->usuario_equ_id = $request->input('UsuarioEquipo');
			$usuario->usuario_tipo_id = $request->input('UsuarioTipo');
			$usuario->save();
			return redirect('usuario');
		}
	}

	public function deleteActivarInactivar(Request $request){

		$id = $request->input('id');
		$estado = $request->input('estado');

		$usuario = Usuario::where('id','=',$id)->first();

		if($estado == 1){
			$usuario->estreg=0;
		}
		else{
			$usuario->estreg=1;
		}
	
		$usuario->save();

		return redirect('usuario');
		//->with('status_message', 'El estado fue Actualizado Satisfactoriamente');
	}

}